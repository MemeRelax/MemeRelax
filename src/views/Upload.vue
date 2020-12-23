<template>
  <div class="v-upload">
    <TheHeader />
    <div class="v-upload__container">
      <UploadBox />
      <UploadForm />
    </div>
    <TheFooter />
  </div>
</template>

<script>
import TheHeader from "@/components/TheHeader.vue";
import TheFooter from "@/components/TheFooter.vue";
import UploadForm from "@/components/UploadForm.vue";
import UploadBox from "@/components/UploadBox.vue";

export default {
  name: "Upload",
  components: {
    TheHeader,
    TheFooter,
    UploadBox,
    UploadForm,
  },
};
</script>

<style lang="scss" scoped>
.v-upload {
  min-height: 100vh;
  display: grid;
  grid-template-rows: auto 1fr auto;
}

.v-upload__container {
  @extend .container-columns;
}
</style>
