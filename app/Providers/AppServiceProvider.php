<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $role = Auth::user()->role;
            $event->menu->add('Hak Akses: '.strtoupper($role));
            $event->menu->add([
                'text'      => 'Dashboard',
                'url'       => '/',
                'icon'      => 'fas fa-fw fa-tachometer-alt',
            ]);
            $event->menu->add('MENU');
            if ($role=="Administrator") {
                $event->menu->add(
                    [
                        'text' => 'Import & Export',
                        'icon' => 'fas fa-fw fa-database',
                        'submenu'   => [
                            [
                                'text'      => 'Import',
                                'url'       => 'import/new',
                                'icon'      => 'fas fa-fw fa-file-excel'
                            ],
                            [
                                'text'      => 'Data Import',
                                'icon'      => 'fas fa-fw fa-desktop',
                                'submenu'   => [
                                    [
                                    'text'      => 'SC & LS',
                                    'url'       => 'display/data/import/scls',
                                    'icon'      => 'fas fa-fw fa-bolt'
                                    ],
                                    [
                                        'text'  => 'Telpon',
                                        'url'   => 'display/data/import/telpon',
                                        'icon'  => 'fas fa-fw fa-phone'
                                    ],
                                ],
                            ],

                            [
                                'text'      => 'Data Filter',
                                'url'       => 'display/data/filter',
                                'icon'      => 'fas fa-fw fa-filter'
                            ],
                            [   
                                'text'      => 'Export',
                                'url'       => 'export/scls/telp',
                                'icon'      => 'fas fa-fw fa-file-export'
                            ],
                            [
                                'text'      => 'Recycle',
                                'url'       => 'remove/data/import/export',
                                'icon'      => 'fas fa-fw fa-recycle'
                            ],
                        ],
                    ],
                    [
                        'text'      => 'Master Data',
                        'icon'      => 'fas fa-fw fa-tools',
                        'submenu'   => [
                            [
                                'text'      => 'Input Customer',
                                'url'       => 'add/account/autodebet',
                                'icon'      => 'fas fa-fw fa-user-plus'
                            ],
                            [
                                'text'      => 'Account of Customers',
                                'url'       => 'master/account',
                                'icon'      => 'fas fa-fw fa-users',
                            ],
                            [
                                'text'      => 'Account of Autodebet',
                                'url'       => 'master/scls/telp',
                                'icon'      => 'fas fa-fw fa-address-book'
                            ],
                            [
                                'text'      => 'Users Maintenance',
                                'url'       => 'master/users',
                                'icon'      => 'fas fa-fw fa-users-cog'
                            ],
                        ],
                    ],
                    [
                        'text' => 'Guide of System',
                        'url' => 'documentation',
                        'icon' => 'fas fa-fw fa-book-open'
                    ],
                );
            }
            
            else if($role == "Dirut"){
                $event->menu->add(
                    [
                        'text'      => 'Customer Data',
                        'icon'      => 'fas fa-fw fa-info',
                        'submenu'   => [
                            [
                                'text'      => 'Account of Customers',
                                'url'       => '#',
                                'icon'      => 'fas fa-fw fa-users',
                            ],

                            [
                                'text'      => 'Account of Autodebet',
                                'url'       => '#',
                                'icon'      => 'fas fa-fw fa-address-book'
                            ],
                        ],
                    ],

                    [
                        'text'      => 'Data Import & Export',
                        'icon'      => 'fas fa-fw fa-database',
                        'submenu'   => [
                            [
                                'text'      => 'Data Import SC & LS',
                                'url'       => '#',
                                'icon'      => 'fas fa-fw fa-desktop',
                            ],
                            [
                                'text'      => 'Data Import Telpon',
                                'url'       => '#',
                                'icon'      => 'fas fa-fw fa-phone'
                            ],

                            [
                                'text'      => 'Data Filter',
                                'url'       => '#',
                                'icon'      => 'fas fa-fw fa-filter'
                            ],

                            [
                                'text'      => 'Data Export SC LS & Telp',
                                'url'       => '#',
                                'icon'      => 'fas fa-fw fa-file-export'
                            ],

                        ],
                    ],

                    [
                        'text'  =>  'Master Maintenance',
                        'icon'  =>  'fas fa-fw fa-tools',
                        'submen'=>[
                            [
                                'text'  => 'User Maintenance',
                                'url'   => 'master/users',
                                'icon'  => 'fas fa-fw fa-users-cog'
                            ],
                        ],
                    ],
                    [
                        'text'  => 'Guide of System',
                        'url'   => 'documentation',
                        'icon'  => 'fas fa-fw fa-book-open',
                    ],
                );
            }

            else if ($role=="Akunting") {
                $event->menu->add(
                    [
                        'text'      => 'Import & Export',
                        'icon'      => 'fas fa-fw fa-database',
                        'submenu'   => [
                            [
                                'text'      => 'Import',
                                'url'       => 'import/new',
                                'icon'      => 'fas fa-fw fa-file-import'
                            ],
                            [
                                'text'      => 'Data Import',
                                'icon'      => 'fas fa-fw fa-desktop',
                                'submenu'   => [
                                    [
                                    'text'      => 'SC & LS',
                                    'url'       => 'display/data/import/scls',
                                    'icon'      => 'fas fa-fw fa-bolt'
                                    ],
                                    [
                                        'text'  => 'Telpon',
                                        'url'   => 'display/data/import/telpon',
                                        'icon'  => 'fas fa-fw fa-phone'
                                    ],
                                ],
                            ],

                            [
                                'text'      => 'Data Filter',
                                'url'       => 'display/data/filter',
                                'icon'      => 'fas fa-fw fa-filter'
                            ],
                            [   
                                'text'      => 'Export',
                                'url'       => 'export/scls/telp',
                                'icon'      => 'fas fa-fw fa-file-export'
                            ],
                            [
                                'text'      => 'Recycle',
                                'url'       => 'remove/data/import/export',
                                'icon'      => 'fas fa-fw fa-recycle'
                            ],
                        ],
                    ],

                    [
                        'text'      => 'Guide of System',
                        'url'       => 'documentation',
                        'icon'      => 'fas fa-fw fa-book-open'
                    ]
                );
            } 

            else if($role =='CS'){
                $event->menu->add(
                    [
                        'text' => 'Customer Data',
                        'url' => '#',
                        'icon' => 'fas fa-fw fa-info',
                        'submenu'   => [
                            [
                                'text'      => 'Input Customer',
                                'url'       => 'add/account/autodebet',
                                'icon'      => 'fas fa-fw fa-user-plus'
                            ],

                            [
                                'text'      => 'Account of Customers',
                                'url'       => 'master/account',
                                'icon'      => 'fas fa-fw fa-users',
                            ],
                            [
                                'text'      => 'Account of Autodebet',
                                'url'       => 'master/scls/telp',
                                'icon'      => 'fas fa-fw fa-address-book'
                            ],
                        ],
                    ],
                    [
                        'text'      => 'Guide of System',
                        'url'       => 'documentation',
                        'icon'      => 'fas fa-fw fa-book-open'
                    ]
                );
            }
            else {
                $event->menu->add(
                    [
                        'text'      => 'Information Accounts',
                        'icon'      => 'fas fa-fw fa-info',
                        'submenu'   => [
                            [
                                'text'  => 'Customer Accounts',
                                'url'   => '#',
                                'icon'  => 'fas fa-fw fa-users'
                            ],
                            [
                                'text'  => 'Autodebet Accounts',
                                'url'   => '#',
                                'icon'  => 'fas fa-fw fa-address-book'
                            ],
                        ],  
                    ],
                    [
                        'text'      => 'Data Import & Export',
                        'icon'      => 'fas fa-fw fa-database',
                        'submenu'   => [
                            [
                                'text'      => 'Data Import SC & LS',
                                'url'       => '#',
                                'icon'      => 'fas fa-fw fa-desktop'
                            ],
                            [
                                'text'      => 'Data Import Telpon',
                                'url'       => '#',
                                'icon'      => 'fas fa-fw fa-phone'
                            ],
                            [
                                'text'      => 'Data Filter SC & LS',
                                'url'       => '#',
                                'icon'      => 'fas fa-fw fa-bolt',
                            ],
                            [
                                'text'      => 'Data Export SC LS & Telp',
                                'url'       => '#',
                                'icon'      => 'fas fa-fw fa-file-export'
                            ],
                        ],
                    ],
                    [
                        'text' => 'Guide of System',
                        'url' => 'documentation',
                        'icon' => 'fas fa-fw fa-book-open'
                    ],
                );
            }
        });
    }
}
