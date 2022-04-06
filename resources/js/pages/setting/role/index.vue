<template>
  <v-inertable
    :allow-filter="false"
    :filters="inertable.filters"
    :data="inertable.data"
    :columns="inertable.columns"
  >
    <template #attributes>
      <v-app-link
        href="/setting/role/create"
        class="btn-purple focus:ring-2 focus:ring-purple-600 focus:ring-offset-2"
        >New Role</v-app-link
      >
      <v-app-link
        href="/setting/role/permission"
        class="btn-purple focus:ring-2 focus:ring-purple-600 focus:ring-offset-2"
      >
        Manage Permission
      </v-app-link>
    </template>
    <template #role="{ item }">
      <span
        class="rounded-md bg-purple-200 px-2 py-1 text-xs font-medium text-purple-700"
        >{{ item.role }}</span
      >
    </template>
    <template #created_at="{ item: { created_at } }">
      <span>{{ $helper.formatDate(created_at) }}</span>
    </template>
    <template #action>
      <div class="flex space-x-2">
        <button
          class="rounded-md bg-yellow-400 p-2 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2"
        >
          <v-icon name="PencilIcon" type="solid" class="h-3 w-3 text-white" />
        </button>
        <button
          @click.prevent="destroy"
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
export default {
  props: {
    inertable: Object,
  },
  methods: {
    destroy() {
      this.$modal.destroy({
        title: "This is sample of title",
        message: "This is sample of message",
        onAccept: () => {
          console.log("accepted");
          this.$toast.success("Successfully destroy role");
        },
        onCancel: () => {
          this.$modal.close();
        },
      });
    },
  },
};
</script>
