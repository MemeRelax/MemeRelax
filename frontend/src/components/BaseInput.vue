<template>
  <div>
    <label class="b-input__label" :for="$attrs.id">{{ label }}</label
    ><span v-if="instruction" class="u-form-instruction">{{
      instruction
    }}</span>
    <textarea
      v-if="textarea"
      class="b-input"
      v-bind="$attrs"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
    />
    <input
      v-else
      class="b-input"
      v-bind="$attrs"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
    />
  </div>
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
    textarea: {
      type: Boolean,
      default: false,
    },
    index: {
      type: Number,
    },
    instruction: {
      type: String,
    },
  },
};
</script>

<style lang="scss" scoped>
.b-input__label {
  padding: spacer(2);
  background-color: rgba($color-primary, 0.8);
  color: $color-white;
}

.b-input,
.b-input__label {
  border: 0;
  border-bottom: 1px solid $color-primary;
  font-size: rem(14px);
}

.b-input {
  padding: spacer(3);
  width: 100%;
  font-family: inherit;
  background-color: rgba($color-primary, 0.03);
}
</style>
