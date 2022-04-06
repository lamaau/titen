<template>
  <v-inertable
    :allow-filter="false"
    :filters="inertable.filters"
    :data="inertable.data"
    :columns="inertable.columns"
  >
    <template #attributes>
      <button
        @click.prevent="create"
        type="button"
        class="btn-purple btn-ring-purple"
      >
        New Category
      </button>
    </template>
    <template #description="{ item: { description } }">
      <v-nullable :value="description" />
    </template>
    <template #created_at="{ item: { created_at } }">
      <span>{{ $helper.formatDate(created_at) }}</span>
    </template>
    <template #action="{ item: { id } }">
      <div class="flex space-x-2">
        <button
          @click.prevent="edit(id)"
          class="
            p-2
            rounded-md
            focus:ring-2
            bg-yellow-400
            focus:outline-none focus:ring-offset-2 focus:ring-yellow-400
          "
        >
          <v-icon name="PencilIcon" type="solid" class="h-3 w-3 text-white" />
        </button>
        <button
          @click.prevent="destroy(id)"
          type="button"
          class="
            p-2
            rounded-md
            bg-red-500
            focus:ring-2
            focus:outline-none
            focus:ring-offset-2
            focus:ring-red-500
          "
        >
          <v-icon name="TrashIcon" type="solid" class="h-3 w-3 text-white" />
        </button>
      </div>
    </template>
  </v-inertable>
</template>
<script>
import { mapGetters } from "vuex";

export default {
  props: {
    inertable: Object,
  },
  computed: mapGetters({
    category: "category/getCategory",
  }),
  methods: {
    create() {
      this.$modal.open({
        title: "New Category",
        component: require("./create.vue").default,
      });
    },
    async edit(id) {
      await this.$store.dispatch("category/setCategory", id);

      this.$modal.open({
        title: "Update Category",
        category: this.category,
        component: require("./edit.vue").default,
      });
    },
    destroy(id) {
      this.$modal.destroy({
        title: "Are you sure?",
        message: "This will permanently delete the category from database",
        onCancel: () => this.$modal.close(),
        onAccept: () => {
          this.$inertia.delete(`/category/${id}`, {
            onSuccess: () => {
              this.$modal.close();
            },
          });
        },
      });
    },
  },
};
</script>
