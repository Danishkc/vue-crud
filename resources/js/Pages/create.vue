<script setup>
import { useForm } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";
import { defineProps } from "vue";

const form = useForm({
  name: null,
  email: null,
  phone: null
});

defineProps({
  errors: Object
});

function submit() {
  router.post("/customers", form);
}
</script>

<template>
  <div class="container" style="width: 30%; margin-top: 7%;">
    <div class="card">
      <div class="card-header" style="text-align:center;">Create new customer</div>
      <div class="card-body">
        <form @submit.prevent="submit">
          <!-- name input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form1Example1">Name</label>
            <input
              type="name"
              v-model="form.name"
              id="name"
              class="form-control"
              style="border: 1px solid #ced4da;"
            />

            <div class="text-danger text-xs" v-if="errors.name">{{errors.name}}</div>
          </div>
          <!-- Email input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form1Example1">Email address</label>
            <input
              type="email"
              v-model="form.email"
              id="email"
              class="form-control"
              style="border: 1px solid #ced4da;"
            />

            <div class="text-danger text-xs" v-if="errors.email">{{errors.email}}</div>
          </div>

          <!-- Password input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form1Example2">Phone Number</label>
            <input
              type="tel"
              v-model="form.phone"
              id="phone"
              class="form-control"
              style="border: 1px solid #ced4da;"
            />

            <div class="text-danger text-xs" v-if="errors.phone">{{errors.phone}}</div>
          </div>

          <!-- Submit button -->
          <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Create</button>
        </form>
      </div>
    </div>
  </div>
</template>

