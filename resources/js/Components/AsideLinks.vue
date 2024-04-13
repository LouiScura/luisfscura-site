<script setup>
import {Link} from "@inertiajs/vue3";
</script>

<template>
    <aside class="flex flex-col leading-loose text-gray-300 text-lg w-40">
        <Link href="/admin/posts" :class="{ 'text-custom-orange': $page.url.startsWith('/admin/posts') }">Posts</Link>
        <Link href="/admin/projects">Projects</Link>
        <Link href="/admin/tags">Tags</Link>
        <Link href="/admin/categories" :class="{ 'text-custom-orange': $page.url.startsWith('/admin/categories') }">Categories</Link>
        <Link href="/admin/comments">Comments</Link>
    </aside>
</template>
