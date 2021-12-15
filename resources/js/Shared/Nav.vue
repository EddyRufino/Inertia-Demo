<template>
    <nav>
        <ul class="flex space-x-6">
            <li>
                <NavLink href="/" :active="$page.url === '/'">
                    Home
                </NavLink>
            </li>
            <li>
                <NavLink href="/users" :active="$page.component === 'Users'">
                    Users
                </NavLink>
            </li>
            <li>
                <NavLink href="/settings" :active="$page.url.startsWith('/settings')">
                    Settings
                </NavLink>
            </li>
            <li>
                <NavLink href="/logout" method="post" as="button">
                    Log Out
                </NavLink>
            </li>
<!--             <li>
                <Link href="/logout"
                    method="POST"
                    as="button"
                    class="text-blue-500 hover:underline"
                    :data="{ foo: 'bar' }"
                >
                    Log Out
                </Link>
            </li> -->
        </ul>
    </nav>
</template>

<script>
import NavLink from './NavLink';

export default {
  components: {
    NavLink
  },
}
</script>
