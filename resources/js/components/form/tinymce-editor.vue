<script>
// eslint-disable-next-line no-unused-vars
import tinymce from "tinymce";
import TinyMCE from "@tinymce/tinymce-vue";

import "tinymce/themes/silver";
import "tinymce/themes/silver";
import "tinymce/themes/mobile";
import "tinymce/icons/default";

import "tinymce/skins/ui/oxide/skin.min.css";
import "tinymce/skins/ui/oxide/content.min.css";
import "tinymce/skins/content/default/content.css";

import "tinymce/plugins/advlist";
import "tinymce/plugins/anchor";
import "tinymce/plugins/contextmenu";
import "tinymce/plugins/directionality";
import "tinymce/plugins/emoticons";
import "tinymce/plugins/fullpage";
import "tinymce/plugins/fullscreen";
import "tinymce/plugins/help";
import "tinymce/plugins/hr";
import "tinymce/plugins/image";
import "tinymce/plugins/imagetools";
import "tinymce/plugins/importcss";
import "tinymce/plugins/autolink";
import "tinymce/plugins/insertdatetime";
import "tinymce/plugins/legacyoutput";
import "tinymce/plugins/link";
import "tinymce/plugins/lists";
import "tinymce/plugins/media";
import "tinymce/plugins/nonbreaking";
import "tinymce/plugins/noneditable";
import "tinymce/plugins/pagebreak";
import "tinymce/plugins/paste";
import "tinymce/plugins/preview";
import "tinymce/plugins/autoresize";
import "tinymce/plugins/print";
import "tinymce/plugins/quickbars";
import "tinymce/plugins/save";
import "tinymce/plugins/searchreplace";
import "tinymce/plugins/spellchecker";
import "tinymce/plugins/tabfocus";
import "tinymce/plugins/table";
import "tinymce/plugins/template";
import "tinymce/plugins/textcolor";
import "tinymce/plugins/textpattern";
import "tinymce/plugins/autosave";
import "tinymce/plugins/toc";
import "tinymce/plugins/visualblocks";
import "tinymce/plugins/visualchars";
import "tinymce/plugins/wordcount";
import "tinymce/plugins/bbcode";
import "tinymce/plugins/charmap";
import "tinymce/plugins/code";
import "tinymce/plugins/codesample";
import "tinymce/plugins/colorpicker";
import "tinymce/plugins/emoticons/js/emojis";

export default {
  components: {
    editor: TinyMCE,
  },
  data() {
    return {
      init: {
        height: "100%",
        plugins: [
          "lists advlist",
          "image imagetools",
          "link autolink",
          "table",
          "charmap",
          "searchreplace visualblocks code fullscreen",
          "print preview anchor insertdatetime media",
          "help codesample hr pagebreak nonbreaking toc textpattern noneditable ",
          "importcss",
          "directionality",
          "visualchars",
          "emoticons",
          "autosave",
        ],
        toolbar: [
          "undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect",
          "alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | preview save print | insertfile image media template link anchor codesample | ltr rtl",
        ],
        menubar: true,
        convert_urls: false,
        images_upload_handler: (blobInfo, success, failure) => {
          console.log("kdwkd");
        },
      },
    };
  },
  props: ["value"],
  computed: {
    newValue: {
      get() {
        return this.value;
      },
      set(value) {
        this.$emit("input", value);
      },
    },
  },
};
</script>
<template>
  <div class="h-full">
    <editor
      :init="init"
      :value="value"
      v-model="newValue"
      :initial-value="value"
    />
  </div>
</template>