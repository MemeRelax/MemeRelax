<template>
  <div class="b-input__label-row">
    <label class="b-input__label" :for="$attrs.id">{{ label }}</label>
    <span v-if="errorMessage" class="u-form-instruction">
      <ErrorMessage :name="name" />
    </span>
  </div>
  <textarea
    v-if="textarea"
    class="b-input"
    v-bind="$attrs"
    :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"
  />
  <Field
    v-else
    :name="name"
    class="b-input"
    v-bind="$attrs"
    :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"
    :rules="validateInput"
  />
</template>

<script>
import { Field, ErrorMessage } from "vee-validate";

export default {
  components: { Field, ErrorMessage },
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
    errorMessage: {
      type: String,
    },
    name: {
      type: String,
      required: true,
    },
  },
  methods: {
    validateInput(value) {
      if (!value) {
        return this.errorMessage;
      }
      return true;
    },
  },
};
</script>

<style lang="scss" scoped>
.b-input__label {
  display: inline-block;
  padding: spacer(2);
  background-color: rgba($color-primary, 0.8);
  color: $color-white;
}

.b-input,
.b-input__label {
  align-self: flex-start;
  border: 0;
  border-bottom: 1px solid $color-primary;
  font-size: rem(14px);
}

.b-input {
  align-self: stretch;
  max-width: rem(300px);
  padding: spacer(3);
  font-family: inherit;
  background-color: rgba($color-primary, 0.03);
}
</style>
