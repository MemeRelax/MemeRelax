<template>
  <div class="b-checkbox-group">
    <span v-if="heading" class="b-checkbox-group__heading">{{ heading }}</span
    ><span v-if="errorMessage" class="u-form-instruction">
      <ErrorMessage :name="name" />
    </span>
    <ul class="b-checkbox-group__list">
      <li
        class="b-checkbox-group__list-item"
        v-for="tag in items"
        :key="`${tag.id}-tag-${index}`"
      >
        <Field
          :name="name"
          class="b-checkbox-group__input"
          v-bind="$attrs"
          type="checkbox"
          :id="`${tag.id}-${index}`"
          :value="tag.id"
          v-model="selectedTags"
          @change="$emit('update:modelValue', selectedTags)"
          :rules="validateCheckboxGroup"
        />
        <label class="b-checkbox-group__label" :for="`${tag.id}-${index}`">{{
          tag.name
        }}</label>
      </li>
    </ul>
  </div>
</template>

<script>
import { Field, ErrorMessage } from "vee-validate";

export default {
  components: { Field, ErrorMessage },
  props: {
    heading: {
      type: [String, Number],
    },
    modelValue: {
      type: Array,
    },
    items: {
      type: Array,
      required: true,
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
  data: function() {
    return {
      selectedTags: [],
    };
  },
  methods: {
    validateCheckboxGroup(value) {
      if (value && value.length) {
        return true;
      }
      return this.errorMessage;
    },
  },
};
</script>

<style lang="scss" scoped>
.b-checkbox-group__heading {
  display: inline-block;
  margin-bottom: spacer(2);
  padding: spacer(2);
  background-color: rgba($color-primary, 0.8);
  color: $color-white;
  font-size: rem(14px);
}

.b-checkbox-group__list {
  list-style: none;
}

.b-checkbox-group__list-item {
  display: inline;
}

.b-checkbox-group__label {
  display: inline-block;
  border: 1px solid rgba($color-primary, 0.3);
  border-radius: 50px;
  color: rgba($color-primary, 0.8);
  font-size: rem(14px);
  font-weight: 400;
  white-space: nowrap;
  margin: 4px;
  padding: spacer(1) spacer(2);
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-tap-highlight-color: transparent;
  transition: all 0.2s;
  cursor: pointer;
}

.b-checkbox-group__input[type="checkbox"]:checked + .b-checkbox-group__label {
  border: 1px solid $color-primary;
  background-color: $color-primary;
  color: $color-secondary;
  transition: all 0.2s;
}

.b-checkbox-group__input[type="checkbox"] {
  position: absolute;
  opacity: 0;
}
.b-checkbox-group__input[type="checkbox"]:focus + .b-checkbox-group__label {
  border: 1px solid $color-secondary;
}
</style>
