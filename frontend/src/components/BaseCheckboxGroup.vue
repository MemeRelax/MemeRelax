<template>
  <ul class="c-upload-form__tag-list">
    <li v-for="tag in items" :key="`${tag.id}-tag`">
      <input
        v-bind="$attrs"
        type="checkbox"
        :id="tag.id"
        :value="tag.id"
        v-model="selectedTags"
        @change="$emit('update:modelValue', selectedTags)"
      />
      <label :for="tag.id">{{ tag.name }}</label>
    </li>
  </ul>
</template>

<script>
export default {
  props: {
    modelValue: {
      type: Array,
    },
    items: {
      type: Array,
      required: true,
    },
  },
  data: function() {
    return {
      selectedTags: [],
    };
  },
};
</script>

<style lang="scss" scoped>
ul {
  list-style: none;
}

li {
  display: inline;
}

label {
  display: inline-block;
  border: 1px solid rgba($color-primary, 0.3);
  color: rgba($color-primary, 0.6);
  font-size: rem(14px);
  white-space: nowrap;
  margin: 4px;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-tap-highlight-color: transparent;
  transition: all 0.2s;
}

label {
  padding: spacer(2) spacer(3);
  cursor: pointer;
}

input[type="checkbox"]:checked + label {
  border: 1px solid $color-primary;
  background-color: $color-primary;
  color: $color-secondary;
  transition: all 0.2s;
}

input[type="checkbox"] {
  position: absolute;
  opacity: 0;
}
input[type="checkbox"]:focus + label {
  border: 1px solid $color-secondary;
}
</style>
