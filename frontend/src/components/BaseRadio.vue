<template>
  <input
    type="radio"
    :checked="modelValue === value"
    :value="value"
    @change="$emit('update:modelValue', $props.value)"
    v-bind="$attrs"
  />
  <label>{{ label }}</label>
</template>

<script>
export default {
  props: {
    label: {
      type: String,
      default: "",
    },
    modelValue: {
      type: [String, Number],
      default: "",
    },
    value: {
      type: [String, Number],
      required: true,
    },
  },
};
</script>

<style></style>
