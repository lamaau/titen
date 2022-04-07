<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;

Breadcrumbs::for(
    'setting.user.index',
    fn (Trail $trail) => $trail->push(__('User'), route('setting.user.index'))
);

Breadcrumbs::for(
    'setting.user.create',
    fn (Trail $trail) => $trail->parent('setting.user.index')->push(__('New'), route('setting.user.create'))
);

Breadcrumbs::for(
    'setting.role.index',
    fn (Trail $trail) => $trail->push(__('Role'), route('setting.role.index'))
);

Breadcrumbs::for(
    'setting.role.create',
    fn (Trail $trail) => $trail->parent('setting.role.index')->push(__('New'), route('setting.role.create'))
);

Breadcrumbs::for(
    'setting.role.permission.index',
    fn (Trail $trail) => $trail->parent('setting.role.index')->push(__('Permission'), route('setting.role.permission.index'))
);
