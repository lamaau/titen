<template>
  <div
    class="border border-gray-200 shadow dark:border-cool-gray-700 sm:rounded-lg"
  >
    <div class="p-4" v-if="title">
      <h2 class="text-xl font-bold text-gray-700 dark:text-cool-gray-300">
        {{ title }}
      </h2>
    </div>

    <div
      class="flex items-center border-t border-dashed bg-white p-5 dark:border-cool-gray-700 dark:bg-cool-gray-600"
      :class="[$slots['attributes'] ? 'justify-between' : 'justify-end']"
    >
      <div class="flex items-center space-x-2">
        <slot name="attributes" :filtered="filtersModels" />
      </div>

      <div class="flex items-center space-x-2">
        <!-- search -->
        <search v-model="params.search" v-if="allowSearch" />

        <select
          v-model="params.perpage"
          v-if="allowPerPage"
          class="form-select text-sm dark:border-cool-gray-500 dark:bg-cool-gray-700 dark:text-cool-gray-300"
        >
          <option value="15">15</option>
          <option value="30">30</option>
          <option value="60">60</option>
        </select>

        <!-- filters -->
        <dropdown2
          text="Filter"
          :pill="pill"
          icon="FilterIcon"
          v-if="allowFilter && Object.keys(fields ?? []).length"
        >
          <div class="flex flex-col space-y-4 p-4">
            <template v-for="(field, key) in fields" :key="key">
              <div class="w-64">
                <v-multi-select
                  @clear="handleClearSelect(key)"
                  :label="fields[key].name"
                  @select="handleSelectFilter($event, key)"
                  v-model="filtersModels[key]"
                  :url="fields[key].url"
                />
              </div>
            </template>
            <button
              class="btn-red w-full"
              type="button"
              @click.prevent="handleClearFilters"
            >
              Bersihkan
            </button>
          </div>
        </dropdown2>
      </div>
    </div>

    <div class="overflow-auto border-b border-dashed dark:border-cool-gray-700">
      <div
        class="flex space-x-6 border-t border-dashed py-2 px-4 dark:border-cool-gray-700"
        v-if="params.column && params.direction"
      >
        <div class="flex items-center space-x-2">
          <p class="text-sm dark:text-cool-gray-200">Penyortiran Diterapkan:</p>
          <span
            class="flex items-center rounded-md bg-purple-500 text-sm text-white"
          >
            <p class="py-1 px-2">
              {{ columnName }}: {{ params.direction === "asc" ? "A-Z" : "Z-A" }}
            </p>
            <button
              @click.prevent="handleClearSort"
              type="button"
              class="mr-1 rounded-md bg-purple-600 py-1 px-1"
            >
              <v-icon name="XIcon" class="h-3 w-3" />
            </button>
          </span>
        </div>
      </div>

      <table
        class="min-w-full divide-y divide-gray-200 dark:divide-cool-gray-500"
      >
        <thead class="border-t bg-gray-50 dark:border-cool-gray-500">
          <tr>
            <th v-if="allowCheckbox" class="table-heading-cell">
              <input
                @click="handleSelectCheckboxCheckboxAll"
                v-model="selectAll"
                type="checkbox"
                class="form-input-checkbox form-checkbox"
              />
            </th>
            <template v-for="(column, index) in columns" :key="index">
              <th v-if="!column.blank" scope="col" class="table-heading-cell">
                <div
                  class="flex items-center"
                  @click="handleSort(column)"
                  :class="[
                    column.sortable ? 'cursor-pointer' : 'cursor-default',
                  ]"
                >
                  {{ column.text }}

                  <v-icon
                    name="ChevronUpIcon"
                    type="solid"
                    v-if="
                      filters &&
                      column.sortable &&
                      params.direction == 'asc' &&
                      params.column == column.column
                    "
                    class="ml-2 h-4 w-4"
                  />
                  <v-icon
                    name="ChevronDownIcon"
                    type="solid"
                    v-if="
                      filters &&
                      column.sortable &&
                      params.direction == 'desc' &&
                      params.column == column.column
                    "
                    class="ml-2 h-4 w-4"
                  />
                </div>
              </th>
            </template>
          </tr>
        </thead>
        <tbody
          v-if="data.data.length"
          class="divide-y divide-gray-200 bg-white dark:divide-cool-gray-700"
        >
          <template v-if="!$slots['body']">
            <tr
              v-for="(item, index) in data.data"
              :key="index"
              class="hover:bg-gray-100 dark:text-cool-gray-100"
            >
              <td v-if="allowCheckbox" class="table-body-cell">
                <input
                  @change="handleSelectCheckbox"
                  v-model="selected"
                  :value="item[checkboxKey]"
                  type="checkbox"
                  class="form-input-checkbox form-checkbox"
                />
              </td>
              <template
                v-for="(column, columnIndex) in columns"
                :key="columnIndex"
              >
                <td v-if="!column.blank" class="table-body-cell">
                  <slot :name="column.column" :item="item" />

                  <div v-if="!$slots[column.column]">
                    {{ item[column.column] }}
                  </div>
                </td>
              </template>
            </tr>
          </template>
          <template v-else>
            <slot name="body" :data="data" :columns="columns" />
          </template>
        </tbody>
        <tbody v-else>
          <tr>
            <td
              :colspan="columns.filter((c) => c.blank === false).length"
              class="bg-white py-8 text-center text-gray-400 dark:bg-cool-gray-600 dark:text-cool-gray-200"
            >
              <div class="flex flex-col items-center justify-center space-y-1">
                <v-icon name="InboxIcon" type="outline" class="h-8 w-8" />
                <span>Kosong</span>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="flex items-center justify-between p-4">
      <div class="text-sm text-cool-gray-800 dark:text-cool-gray-200">
        Show <span class="font-bold">{{ data.from ?? 0 }}</span> to
        <span class="font-bold">{{ data.to ?? 0 }}</span> from
        <span class="font-bold">{{ data.total }}</span>
      </div>
      <pagination :links="data.links" />
    </div>
  </div>
</template>
<script>
import { throttle, pickBy } from "lodash";
import search from "~/components/table/search.vue";
import dropdown2 from "~/components/menu/dropdown2.vue";
import tableFilter from "~/components/table/filter.vue";
import pagination from "~/components/table/pagination.vue";

export default {
  components: {
    search,
    tableFilter,
    pagination,
    dropdown2,
  },
  props: {
    data: Object,
    title: String,
    columns: Object,
    allowPerPage: {
      type: Boolean,
      default: () => true,
    },
    allowSearch: {
      type: Boolean,
      default: () => true,
    },
    allowFilter: {
      type: Boolean,
      default: () => true,
    },
    allowCheckbox: {
      type: Boolean,
      default: false,
    },
    checkboxKey: {
      type: String,
      default: "id",
    },
    filters: {
      type: Object,
      required: false,
      default: () => null,
    },
    fields: {
      type: Object,
      required: false,
    },
  },
  async mounted() {
    if (this.filters && this.filters.filters !== null) {
      let keys = Object.keys(this.filters.filters);

      let response = await Promise.all(
        keys.map((value) =>
          fetch(
            `${process.env.MIX_APP_URL}/${this.fields[value].url}/${this.filters.filters[value]}`,
          ),
        ),
      )
        .then(function (responses) {
          return Promise.all(
            responses.map(function (response) {
              return response.json();
            }),
          );
        })
        .catch(function (error) {
          console.error(error);
        });

      keys.map((value, index) => {
        this.filtersModels[value] = {
          value: response[index][this.fields[value].attributes[0]],
          label: response[index][this.fields[value].attributes[1]],
        };
      });
    }
  },
  data() {
    return {
      selected: [],
      selectAll: false,
      params: {
        column: this.filters?.column,
        search: this.filters?.search,
        direction: this.filters?.direction,
        perpage: this.filters?.perpage ?? 15,
        filters: this.filters.filters
          ? Object.keys(this.filters.filters).reduce(
              (ac, a) => ({ ...ac, [a]: this.filters.filters[a] }),
              {},
            )
          : null,
      },
      filtersModels: this.fields
        ? Object.keys(this.fields).reduce((ac, a) => ({ ...ac, [a]: null }), {})
        : null,
    };
  },
  computed: {
    columnName() {
      if (this.params.column) {
        return this.columns.filter((v) => v.column === this.params.column)[0]
          .text;
      }
    },
    pill() {
      return this.filters.filters
        ? Object.keys(this.filters.filters).length
        : null;
    },
  },
  methods: {
    handleSort({ column, sortable }) {
      if (!sortable) return;

      this.params.column = column;
      this.params.direction = this.params.direction === "asc" ? "desc" : "asc";
    },
    handleClearSort() {
      this.params.column = null;
      this.params.direction = null;
    },
    handleSelectFilter(event, key) {
      if (this.params.filters) {
        this.params.filters = Object.assign(this.params.filters, {
          [key]: event.value,
        });
      } else {
        this.params.filters = {
          [key]: event.value,
        };
      }
    },
    handleClearFilters() {
      if (this.params.filters) {
        Object.keys(this.params.filters).some((value) => {
          this.filtersModels[value] = null;
        });

        this.params.filters = null;
      }
    },
    handleClearSelect(key) {
      delete this.params.filters[key];
    },
    handleSelectCheckbox() {
      let selected = this.data.data.filter((value) =>
        Object.values(this.selected).includes(value[this.checkboxKey]),
      );
      this.$emit("on-select", selected);
    },
    handleSelectCheckboxCheckboxAll() {
      let all = [];
      this.selected = [];

      if (!this.selectAll) {
        for (let item in this.data.data) {
          all.push(this.data.data[item]);
          this.selected.push(this.data.data[item][this.checkboxKey]);
        }
      }

      this.$emit("on-select-all", all);
    },
  },
  watch: {
    params: {
      handler: throttle(function () {
        let params = pickBy(this.params);

        this.$inertia.get(`${window.location.pathname}`, params, {
          replace: true,
          preserveState: true,
        });
      }, 500),
      deep: true,
    },
    selected: {
      handler: function () {
        if (this.data.data.length != this.selected.length) {
          this.selectAll = false;
        } else {
          this.selectAll = true;
        }
      },
      deep: true,
    },
  },
};
</script>
