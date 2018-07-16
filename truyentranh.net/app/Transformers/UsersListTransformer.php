<?php

namespace App\Transformers;

use App\Models\User;

class UsersListTransformer extends BaseTransformer
{

    public function transform(User $user)
    {
        $routeParams = ['user' => $user->id];
        $actions = [
            'edit'   => [
                'label'     => 'Edit',
                'attribute' => [
                    'href' => route('users.edit', $routeParams),
                ],
            ],
            'delete' => [
                'label'     => 'Delete',
                'attribute' => [
                    'href'          => 'javascript:void(0);',
                    'onclick'       => 'deleteItem(this)',
                    'data-ajax-url' => route('users.destroy', $routeParams),
                ],
            ],
        ];

        return [
            'id'         => $user->id,
            'avatar'     => $this->getHtmlAvatar($user),
            'name'       => $user->name,
            'email'      => $user->email,
            'level'      => $this->getHtmlLevel($user->level),
            'status'     => $this->getStatusHtml($user->status),
            'created_at' => $user->created_at,
            'actions'    => $this->getActionsHtml($actions),
        ];
    }

    private function getHtmlAvatar($user)
    {
        $html = '<a href="'.route('users.edit',$user->id).'">';
        if(!empty($user->avatar)){
            $html .= '<img class="img-thumbnail" src="'.asset(PATH_AVATAR_THUMBNAIL.$user->avatar).'" alt="'.$user->name.'" />';
        }
        $html .= '</a>';
        return $html;
    }

    private function getHtmlLevel($level)
    {
        switch ($level) {
            case 1 :
                $level = 'Người dùng';
                break;
            case 2 :
                $level = 'Tác giả';
                break;
            case 3 :
                $level = 'Quản trị viên';
                break;
            default:
                $level = 'Update';
        }
        return $level;
    }
}
