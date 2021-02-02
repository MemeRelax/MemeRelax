<template>
  <header class="c-header">
    <div class="c-header__container">
      <router-link
        to="/"
        @mouseover="headingHover = true"
        @mouseleave="headingHover = false"
        class="c-header__main-heading"
        :class="{ active: headingHover }"
        >Memerelax</router-link
      >
      <nav class="c-header__navigaton">
        <router-link to="/upload" class="c-header__link">Upload</router-link> |
        <router-link to="/login" class="c-header__link">Log in</router-link>
      </nav>
    </div>
  </header>
</template>

<script>
export default {
  name: "TheHeader",
  data() {
    return {
      headingHover: false,
    };
  },
};
</script>

<style lang="scss" scoped>
.c-header {
  @include pad-tb-spacer(2);
  background-color: $color-primary;
}

.c-header__container {
  @extend .u-container;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.c-header__main-heading {
  font-family: $font-special;
  font-size: rem(30px);
  color: $color-secondary;
  text-decoration: none;
  &.active {
    -webkit-text-fill-color: transparent;
    -webkit-background-clip: text;
    background-image: url("http://nothing-mundane.com/wp-content/uploads/2014/03/shibe_doge_wallpaper.png");
    background-size: cover;
    -webkit-text-fill-color: transparent;
    -webkit-text-stroke-width: 2px;
    -webkit-text-stroke-color: $color-secondary;
  }

  @include respond("md") {
    font-size: rem(60px);
  }
}

.c-header__navigaton {
  color: $color-white;
}

.c-header__link {
  font-size: rem(20px);
  &:link,
  &:visited {
    color: $color-white;
  }
  &:hover,
  &:active {
    color: $color-secondary;
  }
}
</style>
