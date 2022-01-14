<template>
    <button :type="type" class="inline-flex items-center px-5 py-2 md:py-3 bg-white border border-transparent rounded-md font-bold text-sm md:text-lg text-dark uppercase tracking-widest hover:bg-slate-200 active:bg-slate-200 focus:outline-none focus:border-white focus:shadow-outline-slate-200 transition ease-in-out duration-150 shadow">
        <slot />
    </button>
</template>

<script>
export default {
    props: {
        type: {
            type: String,
            default: 'submit',
        },
    }
}
</script>
