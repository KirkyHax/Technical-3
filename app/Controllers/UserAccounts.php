<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class UserAccounts extends BaseController
{
    public function index(): string
    {
        $userModel = new UserModel();

        // Model methods are backed by CodeIgniter's Query Builder.
        $users = $userModel
            ->select('id, username, full_name, avatar, created_at')
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('users/index', [
            'title'      => 'User Accounts',
            'activePage' => 'users',
            'users'      => $users,
        ]);
    }

    public function new(): string
    {
        helper('form');

        return view('users/new', [
            'title'      => 'New User',
            'activePage' => 'users',
        ]);
    }

    public function create()
    {
        $rules = [
            'username'  => 'required|max_length[50]|is_unique[users.username]',
            'full_name' => 'required|max_length[100]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        (new UserModel())->insert([
            'username'   => trim((string) $this->request->getPost('username')),
            'full_name'  => trim((string) $this->request->getPost('full_name')),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('user-accounts'))
            ->with('success', 'User account created successfully.');
    }

    public function edit(int $id): string
    {
        $user = (new UserModel())->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound('User account not found.');
        }

        helper('form');

        return view('users/edit', [
            'title'      => 'Edit User',
            'activePage' => 'users',
            'user'       => $user,
        ]);
    }

    public function update(int $id)
    {
        $model = new UserModel();
        $user  = $model->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound('User account not found.');
        }

        $rules = [
            'username'  => "required|max_length[50]|is_unique[users.username,id,{$id}]",
            'full_name' => 'required|max_length[100]',
        ];

        $avatar = $this->request->getFile('avatar');
        if ($avatar !== null && $avatar->getError() !== UPLOAD_ERR_NO_FILE) {
            $rules['avatar'] = 'uploaded[avatar]|max_size[avatar,2048]|is_image[avatar]|mime_in[avatar,image/jpeg,image/png]';
        }

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'username'  => trim((string) $this->request->getPost('username')),
            'full_name' => trim((string) $this->request->getPost('full_name')),
        ];

        if ($avatar !== null && $avatar->isValid() && ! $avatar->hasMoved()) {
            $uploadDirectory = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'avatars';
            if (! is_dir($uploadDirectory)) {
                mkdir($uploadDirectory, 0755, true);
            }

            $avatarName = 'avatar_' . bin2hex(random_bytes(12)) . '.jpg';
            service('image')
                ->withFile($avatar->getTempName())
                ->fit(256, 256, 'center')
                ->save($uploadDirectory . DIRECTORY_SEPARATOR . $avatarName, 85);

            if (! empty($user['avatar'])) {
                $oldAvatar = $uploadDirectory . DIRECTORY_SEPARATOR . basename($user['avatar']);
                if (is_file($oldAvatar)) {
                    unlink($oldAvatar);
                }
            }

            $data['avatar'] = $avatarName;
        }

        $model->update($id, $data);

        return redirect()->to(site_url('user-accounts'))
            ->with('success', 'User account updated successfully.');
    }
}
