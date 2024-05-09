<script>
import { router } from "@inertiajs/vue3";
export default {
  props: {
    customers: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      showMenuB: false,
      showMenuCD: false
    };
  },
  methods: {
    toggleMenuB() {
      this.showMenuB = !this.showMenuB;
    },
    toggleMenuCD() {
      this.showMenuCD = !this.showMenuCD;
    },
    deleteCustomer(id) {
      alert("Are you sure?");
      router.delete("/customers/" + id);
    },
    editCustomer(id) {
      router.get("/customers/" + id + "/edit");
    }
  }
};
</script>

<template>
  <div class="container" style="width: 50%; margin-top: 1%;">
    <div v-if="$page.props.flash.message" class="alert alert-success">
      <strong>{{$page.props.flash.message}}</strong>
    </div>
    <h3 class="text-center text-success">List of Customers</h3>
    <table class="table align-middle mb-0 bg-white">
      <!-- Table header -->
      <thead class="bg-light">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Actions</th>
        </tr>
      </thead>
      <!-- Table body -->
      <tbody>
        <tr v-for="customer in customers" :key="customer.id">
          <td>{{ customer.name }}</td>
          <td>{{ customer.email }}</td>
          <td>{{ customer.phone }}</td>
          <td>
            <button
              type="button"
              @click.prevent="editCustomer(customer.id)"
              class="btn btn-link btn-sm btn-rounded"
            >Edit</button>
            <button
              type="button"
              @click.prevent="deleteCustomer(customer.id)"
              class="btn btn-link btn-sm btn-rounded text-danger"
            >Delete</button>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Toggle button for Menu B -->
    <div class="text-center mt-3">
      <button @click="toggleMenuB" class="btn btn-link btn-sm btn-rounded text-success">List Menu B</button>
    </div>

    <!-- Additional menu content (Menu B) -->
    <div v-if="showMenuB" class="text-center mt-3">
      <!-- Your additional menu content here -->
      <p class="text-warning">This is Menu B content.</p>
      <table class="table align-middle mb-0 bg-white">
        <!-- Table header -->
        <thead class="bg-light">
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
          </tr>
        </thead>
        <!-- Table body -->
        <tbody>
          <tr v-for="customer in customers" :key="customer.id">
            <td>{{ customer.name }}</td>
            <td>{{ customer.email }}</td>
            <td>{{ customer.phone }}</td>
            <td>
              <button
                type="button"
                @click.prevent="editCustomer(customer.id)"
                class="btn btn-link btn-sm btn-rounded"
              >Edit</button>
              <button
                type="button"
                @click.prevent="deleteCustomer(customer.id)"
                class="btn btn-link btn-sm btn-rounded text-danger"
              >Delete</button>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- Toggle button for Menu B -->
      <div class="text-center mt-3">
        <button
          @click="toggleMenuCD"
          class="btn btn-link btn-sm btn-rounded text-success"
        >List Menu C and D</button>
      </div>
    </div>
    <div v-if="showMenuCD" class="d-flex justify-content-between" style="margin-left: -30%;">
      <!-- Menu C content -->
      <div style="margin-right: 20px;">
        <!-- Added margin-right -->
        <p class="text-center mt-5 text-info">This is Menu C content.</p>
        <table class="table align-middle mb-0 bg-white mb-5">
          <!-- Table header -->
          <thead class="bg-light">
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Actions</th>
            </tr>
          </thead>
          <!-- Table body -->
          <tbody>
            <tr v-for="customer in customers" :key="customer.id">
              <td>{{ customer.name }}</td>
              <td>{{ customer.email }}</td>
              <td>{{ customer.phone }}</td>
              <td>
                <button
                  type="button"
                  @click.prevent="editCustomer(customer.id)"
                  class="btn btn-link btn-sm btn-rounded"
                >Edit</button>
                <button
                  type="button"
                  @click.prevent="deleteCustomer(customer.id)"
                  class="btn btn-link btn-sm btn-rounded text-danger"
                >Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Menu D content -->
      <div style="margin-left: 20px;">
        <!-- Added margin-left -->
        <p class="text-center mt-5 text-info">This is Menu D content.</p>
        <table class="table align-middle mb-0 bg-white mb-5">
          <!-- Table header -->
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Actions</th>
            </tr>
          </thead>
          <!-- Table body -->
          <tbody>
            <tr v-for="customer in customers" :key="customer.id">
              <td>{{ customer.name }}</td>
              <td>{{ customer.email }}</td>
              <td>{{ customer.phone }}</td>
              <td>
                <button
                  type="button"
                  @click.prevent="editCustomer(customer.id)"
                  class="btn btn-link btn-sm btn-rounded"
                >Edit</button>
                <button
                  type="button"
                  @click.prevent="deleteCustomer(customer.id)"
                  class="btn btn-link btn-sm btn-rounded text-danger"
                >Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
