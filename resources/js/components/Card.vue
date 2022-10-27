<template>

    <div>
        <div v-show="backAble" class="bg-white dark:bg-gray-800 rounded-t-lg p-4 flex justify-between bb hidden shadow"
            :data-uid="$.uid">
            <div class="mr-4">
                <Tooltip>
                    <template #content>{{ __('Back') }}</template>
                    <Icon role="button" @click="navigateBack()" type="arrow-left" :solid="true" />
                </Tooltip>

            </div>
        </div>
        <div
            :class="['bg-white dark:bg-gray-800', rootClasses, { 'shadow rounded-lg': !backAble, 'shadow rounded-b-lg': backAble }]">
            <slot />
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {

        }
    },
    methods: {
        navigateBack() {
            history.back()
        }
    },

    mounted() {


        Array.from(document.getElementsByClassName('bb')).forEach(function (elm, index) {
            if (index == 0) {
                elm.classList.remove('hidden')
            } else {
                elm.nextSibling.classList.add('rounded-lg','shadow')
            }
        })
    },

    computed: {
        backAble() {

            //hide back btn if it is Nova Card
            if (this.$parent.$props.card) {
                return false
            }


            return Nova.config('backAble')
        },

        rootClasses() {
            var classString = this.$attrs.class ?? ""
            return classString.replace('mt-3', '')

        }

    }

}
</script>
