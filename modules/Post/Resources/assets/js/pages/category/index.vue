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
    <template #last_logged_in_at="{ item: { last_logged_in_at } }">
      <not-available :value="$helper.shortTimestamp(last_logged_in_at)" />
    </template>
    <template #created_at="{ item: { created_at } }">
      <span>{{ $helper.formatDate(created_at) }}</span>
    </template>
    <template #action="{ item: { id } }">
      <div class="flex space-x-2">
        <button
          class="rounded-md bg-yellow-400 p-2 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2"
        >
          <v-icon name="PencilIcon" type="solid" class="h-3 w-3 text-white" />
        </button>
        <button
          @click.prevent="destroy(id)"
          type="button"
          class="rounded-md bg-red-500 p-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
        >
          <v-icon name="TrashIcon" type="solid" class="h-3 w-3 text-white" />
        </button>
      </div>
    </template>
  </v-inertable>
</template>
<script>
import notAvailable from "~/components/table/not-available.vue";

export default {
  components: {
    notAvailable,
  },
  props: {
    inertable: Object,
  },
  methods: {
    create() {
      this.$modal.open({
        title: "New Category",
        component: require("./create.vue").default,
      });
    },
    destroy(id) {
      this.$modal.destroy({
        title: "Are you sure?",
        message: "This will permanently delete the category from database",
        onCancel: () => this.$modal.close(),
        onAccept: () => {
          this.$inertia.delete(`/setting/role/permission/${id}`, {
            onSuccess: () => {
              this.$toast.success("Successfully delete permission");
              this.$modal.close();
            },
          });
        },
      });
    },
  },
};
</script>
