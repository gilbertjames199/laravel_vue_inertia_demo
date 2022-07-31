<template>
    <nav>
        <!--class="flex list-disc space-x-4 list-inside"-->
        <ul class="flex space-x-6">
            <li>
                <NavLink href="/" :active="$page.component == 'Home'">
                    Home
                </NavLink>
                <!--<Link href='/' class='text-blue-500 hover:underline' :class="{'font-bold underline': $page.url == '/'}">
                    Home 
                </Link>-->
            </li>
            <li>
                <NavLink href="/users" :active="$page.component == 'Users'">
                    Users
                </NavLink>
                <!--<Link href='/users?foo-bar' class='text-blue-500 hover:underline' :class="{'font-bold underline': $page.component=='Users'}">Users </Link>-->              
            </li>
            <li>
                <NavLink href="/settings" :active="$page.component == 'Settings'">
                    Settings
                </NavLink>
                <!--<Link href='/settings' class='text-blue-500 hover:underline' :class="{'font-bold underline': $page.component == 'Settings'}">Settings</Link>-->
            </li>
            <li>
                <NavLink href="/imports" :active="$page.component == 'Imports'">
                    Imports
                </NavLink>
                <!--<Link href='/settings' class='text-blue-500 hover:underline' :class="{'font-bold underline': $page.component == 'Settings'}">Settings</Link>-->
            </li>
            <!--
            <li>
                <Link href='/logout' class='text-blue-500 hover:underline' method="post" :data="{ foo: 'bar'}" as="button">
                    Logout 
                </Link>
            </li>
            -->
            <li>
                <NavLink href="/logout" method="post">
                    Logout
                </NavLink>
            </li>
        </ul>
    </nav>
</template>

<script>
//import { Link } from '@inertiajs/inertia-vue3';
import NavLink from './NavLink';
export default{
    components: { NavLink }
};
</script>