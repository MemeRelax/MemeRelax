<template>
  <BaseRadio
    v-for="option in options"
    :key="option.value"
    :label="option.label"
    :value="option.value"
    :name="name"
    :modelValue="modelValue"
    @update:modelValue="'update:modelValue', $event"
  />
</template>

<script>
export default {
  props: {
    options: {
      type: Array,
      required: true,
    },
    name: {
      type: String,
      required: true,
    },
    modelValue: {
      type: [String, Number],
      required: true,
    },
  },
};
</script>

<style></style>
