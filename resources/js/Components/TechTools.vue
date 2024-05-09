<script setup>
    const tools = ['HTML (of course)', 'CSS / Tailwind', 'JavaScript / Vue JS', 'PHP / Laravel', 'API', 'MySQL',
            'SQL Lite', 'Version Control', 'Linux Server', 'WordPress', 'Hosting'
        ]
</script>

<template>
    <ol class="flex flex-wrap lg:justify-between gap-3 py-3">
        <li
            v-for="(tool, index) in tools"
            :class="{'border-amber-900': index % 2 === 0, 'border-blue-900': index % 2 !== 0 }"
            class="inline-block p-2 text-sm text-slate-400 rounded-2xl border-solid border">{{ tool }}</li>
    </ol>
</template>
