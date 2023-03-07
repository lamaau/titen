<script setup name="VResetPasswordModal">
import { useForm } from "@inertiajs/vue3";

const form = useForm({
  old_password: null,
  new_password: null,
  new_password_confirmation: null,
});
</script>
<template>
  <v-modal-container>
    <div class="p-2 border-b">
      <h1 class="font-bold text-lg text-gray-900">Ubah Password</h1>
    </div>
    <div class="p-4 flex flex-col space-y-2">
      <v-input
        :required="true"
        v-model="form.old_password"
        :error="form.errors.old_password"
        type="password"
        label="Password Sekarang"
      />
      <v-input
        :required="true"
        v-model="form.new_password"
        :error="form.errors.new_password"
        type="password"
        label="Password Baru"
      />
      <v-input
        :required="true"
        v-model="form.new_password_confirmation"
        :error="form.errors.new_password_confirmation"
        type="password"
        label="Konfirmasi Password Baru"
      />
    </div>
    <div class="p-2 border-t flex flex-row justify-end space-x-2">
      <button class="btn-red" @click.prevent="$modal.close()">Batal</button>
      <v-loading-button
        label="Ubah"
        :loading="form.processing"
        @click.prevent="
          form.post(route('admin.setting.password'), {
            onSuccess: () => $modal.close(),
          })
        "
      />
    </div>
  </v-modal-container>
</template>
