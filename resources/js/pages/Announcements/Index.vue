<script setup>
import { router, Link } from '@inertiajs/vue3'
import { ref } from 'vue'

const props = defineProps({
  announcements: Array,
  filters: Object,
})

const search = ref(props.filters.search || '')
const status = ref(props.filters.status || 'all')

function applyFilters() {
  router.get(
    '/announcements',
    {
      search: search.value,
      status: status.value,
    },
    {
      preserveState: true,
      replace: true,
    }
  )
}

function deleteAnnouncement(id) {
  if (confirm('Are you sure you want to delete this announcement?')) {
    router.delete(`/announcements/${id}`)
  }
}

</script>

<template>
  <div class="max-w-5xl mx-auto p-6">
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-3xl font-bold">Announcements</h1>
      <Link
        href="/announcements/create"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
      >
        New Announcement
      </Link>
    </div>

    <div class="bg-white rounded shadow p-4 mb-6 flex gap-4">
      <input
        v-model="search"
        type="text"
        placeholder="Search announcements..."
        class="border rounded px-3 py-2 w-full text-black"
      />

      <select
        v-model="status"
        class="border rounded px-3 py-2 text-black"
      >
        <option value="all">All</option>
        <option value="draft">Draft</option>
        <option value="published">Published</option>
        <option value="archived">Archived</option>
      </select>

      <button
        @click="applyFilters"
        class="bg-gray-800 text-white px-4 py-2 rounded"
      >
        Apply
      </button>
    </div>

    <div v-if="announcements.length === 0" class="text-gray-500">
      No announcements found.
    </div>

    <div v-else class="space-y-4">
      <div
        v-for="announcement in announcements"
        :key="announcement.id"
        class="bg-white rounded shadow p-4"
      >
        <div class="flex items-start justify-between">
          <div>
            <h2 class="text-xl font-semibold text-black" >{{ announcement.title }}</h2>
            <p class="text-sm text-gray-500 mb-2">
              Status: {{ announcement.status }}
            </p>
            <p class="text-gray-700">{{ announcement.body }}</p>
          </div>

          <div class="flex gap-2">
            <Link
              :href="`/announcements/${announcement.id}/edit`"
              class="text-blue-600 hover:underline"
            >
              Edit
            </Link>

            <button
              @click="deleteAnnouncement(announcement.id)"
              class="text-red-600 hover:underline"
            >
              Delete
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>