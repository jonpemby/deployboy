<template>
    <div class="flex"
        :class="{
            'flex-col': dropdown,
            'bg-white': dropdown,
        }">
        <app-nav-link v-for="link, index in links"
            :key="`link-${index}`"
            :properties="link"
            :dropdown="dropdown">
        </app-nav-link>
    </div>
</template>

<script>
    export default {
        props: {
            links: {
                type: Array,
                required: true,
            },

            dropdown: {
                type: Boolean,
                default: false,
            },
        },

        mounted() {
            if (this.dropdown) {
                new Popper(this.$parent.$el, this.$el);
            }
        },
    }
</script>

