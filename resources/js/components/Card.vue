<template>
    <div>
        <div v-show="backAble" class="bg-white rounded-t-lg p-4 flex justify-between">
            <div class="mr-4">
                <Tooltip>
                    <template #content>Back</template>
                    <Icon role="button" @click="navigateBack()" type="arrow-left" :solid="true" />
                </Tooltip>

            </div>
        </div>
        <div :class=" [ 'bg-white dark:bg-gray-800', rootClasses , { 'shadow rounded-lg' : !backAble , 'shadow-b rounded-b-lg' : backAble } ]">
            <slot />
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        navigateBack() {
            history.back()
        }
    },

    computed: {
        backAble() {
            return Nova.config('backAble')
        },

        rootClasses(){
            var classString = this.$attrs.class ?? ""
            return classString.replace('mt-3','')

        }
    }

}
</script>
