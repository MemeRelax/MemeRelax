module.exports = {
  css: {
    loaderOptions: {
      sass: {
        prependData: `
        @import "@/styles/_variables.scss"; 
        @import "@/styles/_functions.scss"; 
        @import "@/styles/_reset.scss"; 
        @import "@/styles/_mixins.scss"; 
        @import "@/styles/_utilities.scss";
        `,
      },
    },
  },
};
