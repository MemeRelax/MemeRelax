<template>
  <div class="c-upload-form">
    <div class="c-upload-form__container">
      <div class="c-upload-form__form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" />
      </div>
      <div class="c-upload-form__form-group">
        <ul class="c-upload-form__tag-list">
          <li v-for="tag in $store.state.tags" :key="`${tag.id}-tag`">
            <input type="checkbox" :id="tag.id" :value="tag.id" /><label
              :for="tag.id"
              >{{ tag.name }}</label
            >
          </li>
        </ul>
      </div>

      <button>SAVE</button>
    </div>
  </div>
</template>

<script>
export default {
  name: "UploadForm",
  data: function() {
    return {
      tags: [],
    };
  },
};
</script>

<style lang="scss" scoped>
.c-upload-form {
  @include pad-tb-spacer(4);
}

.c-upload-form__container {
  @extend .container;
}

.c-upload-form__form-group {
  display: flex;
  flex-wrap: wrap;
}

ul.c-upload-form__tag-list {
  list-style: none;
}
ul.c-upload-form__tag-list li {
  display: inline;
}
ul.c-upload-form__tag-list li label {
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

ul.c-upload-form__tag-list li label {
  padding: spacer(2) spacer(3);
  cursor: pointer;
}

ul.c-upload-form__tag-list li input[type="checkbox"]:checked + label {
  border: 1px solid $color-primary;
  background-color: $color-primary;
  color: $color-secondary;
  transition: all 0.2s;
}

ul.c-upload-form__tag-list li input[type="checkbox"] {
  display: absolute;
}
ul.c-upload-form__tag-list li input[type="checkbox"] {
  position: absolute;
  opacity: 0;
}
ul.c-upload-form__tag-list li input[type="checkbox"]:focus + label {
  border: 1px solid $color-secondary;
}
</style>
