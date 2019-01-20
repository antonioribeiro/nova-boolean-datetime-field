<template>
    <panel-item :field="field">
        <div slot="value" class="text-90 flex">
            <div
                v-if="field.showBadge"
                class="flex rounded-full uppercase px-2 py-1 w-12 text-xs font-bold mr-3 justify-center"
                :class="field.value ? field.colorTrue : field.colorFalse"
            >
                {{ field.value ? field.labelTrue : field.labelFalse }}
            </div>

            <div
                v-if="!field.showBadge"
                class="inline-block rounded-full w-2 h-2"
                :class="field.value ? field.colorTrue : field.colorFalse"
            ></div>

            <div>
                <p v-if="field.value" class="text-90">
                    {{ localizedDateTime }}
                </p>
                <p v-else>&mdash;</p>
            </div>
        </div>
    </panel-item>
</template>

<script>
import { InteractsWithDates } from 'laravel-nova'

export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],

    mixins: [InteractsWithDates],

    computed: {
        label() {
            return this.field.value == true ? this.__('Yes') : this.__('No')
        },

        /**
         * Get the localized date time.
         */
        localizedDateTime() {
            return this.localizeDateTimeField(this.field)
        },
    },
}
</script>
