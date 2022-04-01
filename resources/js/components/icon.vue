<template>
  <div>
    <component :is="component"></component>
  </div>
</template>
<script>
export default {
  props: {
    name: String,
    type: {
      type: String,
      default: "solid",
    },
  },
  computed: {
    component() {
      let iconName = String;

      if (this.type === "solid") {
        let solidIcon = require(`@heroicons/vue/solid`);
        iconName = solidIcon[this.name];
      }

      if (this.type === "outline") {
        let outlineIcon = require(`@heroicons/vue/outline`);
        iconName = outlineIcon[this.name];
      }

      return iconName;
    },
  },
};
</script>
