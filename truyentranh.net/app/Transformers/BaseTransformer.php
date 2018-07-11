<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class BaseTransformer extends TransformerAbstract
{
    protected function getStatusHtml($value)
    {
        return view('manage.block.partials.status', [
            'status' => $value
        ])->render();
    }

    protected function getRedirectHtml($link, $content)
    {
        return view('manage.block.partials.redirect', [
            'link'    => $link,
            'content' => $content
        ])->render();
    }

    protected function getActionsHtml($actions)
    {
        return view('manage.block.partials.actionTable', [
            'actions' => $actions
        ])->render();
    }
}
