<template>
    <div class="border border-black rounded-sm shadow bg-white">
        <div class="bg-brand-darker border-0 border-b border-black text-white text-stroke py-2 px-4" v-if="header">
            <h3 class="font-header text-3xl">{{header}}</h3>
        </div>

        <div class="p-4 font-body leading-loose text-brand-dark">
            <slot></slot>
        </div>

        <slot name="footer"></slot>
    </div>
</template>

<script>
    export default {
        props: ['header'],
    }
</script>
