<template>
  <div class="v-upload">
    <TheHeader />
    <main class="v-upload__container">
      <UploadBox />
    </main>
    <TheFooter />
  </div>
</template>

<script>
import TheHeader from "@/components/TheHeader.vue";
import TheFooter from "@/components/TheFooter.vue";
import UploadBox from "@/components/UploadBox.vue";

export default {
  name: "Upload",
  components: {
    TheHeader,
    TheFooter,
    UploadBox,
  },
};
</script>

<style lang="scss" scoped>
.v-upload {
  min-height: 100vh;
  display: grid;
  grid-template-rows: auto 1fr auto;
  background-color: $color-white;
}
</style>
