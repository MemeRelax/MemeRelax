<template>
  <div class="c-upload-form">
    <div class="c-upload-form__container">
      <div class="c-upload-form__form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" />
      </div>
      <div class="c-upload-form__form-group">
        <ul class="c-upload-form__tag-list">
          <li>
            <input type="checkbox" id="all" value="all" /><label for="all"
              >All</label
            >
          </li>
          <li>
            <input type="checkbox" id="pl" value="pl" checked /><label for="pl"
              >PL</label
            >
          </li>
          <li>
            <input type="checkbox" id="en" value="en" checked /><label for="en"
              >EN</label
            >
          </li>
          <li>
            <input type="checkbox" id="other" value="other" /><label for="other"
              >Other</label
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
  // background-color: rgba(255, 255, 255, 0.9);
  border: 1px solid rgba(139, 139, 139, 0.3);
  color: gray;
  font-size: rem(14px);
  border-radius: 20px;
  white-space: nowrap;
  margin: 3px;
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
  border: 1px solid #1bdbf8;
  background-color: #12bbd4;
  color: #fff;
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
  border: 1px solid #e9a1ff;
}
</style>
