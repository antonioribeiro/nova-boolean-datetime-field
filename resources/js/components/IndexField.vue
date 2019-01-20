<template>
    <div class="text-center">
        <span
            v-if="field.showBadge"
            class="flex rounded-full uppercase px-2 py-1 w-12 text-xs font-bold mr-3 justify-center"
            :class="field.value ? field.colorTrue : field.colorFalse"
        >
            {{ field.value ? field.labelTrue : field.labelFalse }}
        </span>

        <span
            v-if="!field.showBadge"
            class="inline-block rounded-full w-2 h-2"
            :class="field.value ? field.colorTrue : field.colorFalse"
        ></span>
    </div>
</template>

<script>
export default {
    props: ['resourceName', 'field'],
}
</script>
