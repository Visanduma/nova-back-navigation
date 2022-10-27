<template>
    <div class="flex items-center justify-start">
        <Tooltip v-show="backAble" class="mr-4" :class="{'mb-3': !hasText}">
            <template #content>Back</template>
            <Icon role="button" @click="navigateBack()" type="arrow-left" :solid="true" />
        </Tooltip>
        <component v-if="! hasText" v-bind="$attrs" :is="component" :class="classes">
            <slot />
        </component>
    </div>
    <component v-if="hasText" v-bind="$attrs" :is="component" :class="classes">
        <slot />
    </component>
</template>

<script>
const classes = {
    1: 'text-90 font-normal text-xl md:text-2xl',
    2: 'text-90 font-normal md:text-xl',
    3: 'text-90 uppercase tracking-wide font-bold md:text-sm',
    4: 'text-90 font-normal md:text-2xl',
}

export default {
    props: {
        level: {
            default: 1,
            type: Number,
        },
    },

    mounted() {

        console.log(this.$parent.$attrs)

    },


    methods: {
        navigateBack() {
            history.back()
        },

        addHtmlContent() {
            //
        }
    },

    computed: {
        component() {
            return 'h' + this.level
        },
        classes() {
            return classes[this.level]
        },

        backAble() {
            console.log(this.$attrs)
            return Nova.config('backAble')
        },

        hasText(){
            return this.$attrs.textContent != null
        }
    },
}
</script>
