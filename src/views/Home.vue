<template>
  <div class="home">
    <TheHeader/>
    <TheFilter/>
    <TheMain/>
    <TheFooter/>
  </div>
</template>

<script>
import TheHeader from "@/components/TheHeader.vue";
import TheFooter from "@/components/TheFooter.vue";
import TheFilter from "@/components/TheFilter.vue";
import TheMain from "@/components/TheMain.vue";

export default {
  name: "Home",
  components: {
    TheHeader, TheFooter, TheFilter, TheMain
  }
};
</script>
