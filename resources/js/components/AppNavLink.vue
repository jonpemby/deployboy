<template>
    <a :href="link.href"
        class="no-underline text-grey hover:text-grey-dark hover:bg-grey-dark hover:text-white px-4 py-2"
        @mouseenter="hovered = true"
        @mouseleave="hovered = false">
        {{ link.text }}
        <app-navigation v-if="link.sublinks && hovered"
            :dropdown="true"
            :links="link.sublinks">
        </app-navigation>
    </a>
</template>

<script>
    export default {
        props: {
            properties: {
                type: Array,
                required: true,
            },

            dropdown: {
                type: Boolean,
                default: false,
            },
        },

        data() {
            const { properties } = this;

            if (properties.length < 3) {
                properties.push(false);
            }

            return {
                hovered: false,
                link: _.zipObject(['text', 'href', 'sublinks'], properties),
            };
        },
    }
</script>
