<template>
  <div class="max-w-4xl mx-auto p-4">
    <input v-model="q" class="border p-2 w-full" placeholder="Search building..." />
    <div class="mt-4 space-y-2">
      <div v-for="s in filtered" :key="s.id" class="border rounded p-3">
        <div class="font-semibold">{{ s.building }}</div>
        <div class="text-sm text-gray-600">{{ s.review_count }} reviews • {{ s.avg_rating }}★</div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';

const q = ref('');
const spots = ref([]);

onMounted(async () => {
  spots.value = await fetchWithCache('/api/study-spots', 300); // 5 min cache
});

const filtered = computed(() => {
  const term = q.value.trim().toLowerCase();
  if (!term) return spots.value;
  return spots.value.filter(s => (s.building || '').toLowerCase().includes(term));
});

// ---- SIMPLE CACHE (localStorage + TTL) ----
async function fetchWithCache(url, ttlSeconds) {
  const key = 'cache:' + url;
  const raw = localStorage.getItem(key);
  if (raw) {
    const parsed = JSON.parse(raw);
    if (Date.now() < parsed.expiresAt) return parsed.data;
  }
  const res = await fetch(url, { headers: { Accept: 'application/json' }});
  const data = await res.json();
  localStorage.setItem(key, JSON.stringify({
    expiresAt: Date.now() + ttlSeconds * 1000,
    data
  }));
  return data;
}
</script>