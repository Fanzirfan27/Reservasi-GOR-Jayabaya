<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Riwayat Reservasi') }}
    </h2>
  </x-slot>

  <div class="w-full">
    <!-- Tabs -->
    <div class="flex border-b border-gray-300 space-x-2 mb-4" id="tabs">
      @php
        $tabs = ['all' => 'Semua', 'Pending' => 'Pending', 'Approved' => 'Approved', 'Done' => 'Done', 'Rejected' => 'Rejected'];
      @endphp
      @foreach ($tabs as $key => $label)
        <button 
          onclick="loadTab('{{ $key }}')" 
          class="tab-button py-2 px-4 text-sm font-medium text-gray-600 {{ $key === 'all' ? 'border-b-2 text-blue-600 border-blue-500' : '' }}" 
          id="tab-{{ $key }}">
          {{ $label }}
        </button>
      @endforeach
    </div>

    <!-- Content -->
    <div id="tab-content" class="min-h-[200px] bg-white p-4 shadow-sm rounded">
      <p class="text-gray-500">Memuat data...</p>
    </div>
  </div>

  <script>
    async function loadTab(tabName) {
  const tabButtons = document.querySelectorAll('.tab-button');
  tabButtons.forEach(btn => {
    btn.classList.remove('text-blue-600', 'border-blue-500');
    btn.classList.add('text-gray-600');
  });

  const activeBtn = document.getElementById(`tab-${tabName}`);
  if (activeBtn) {
    activeBtn.classList.add('text-blue-600', 'border-blue-500');
    activeBtn.classList.remove('text-gray-600');
  }

  const tabContent = document.getElementById('tab-content');
  tabContent.innerHTML = '<p class="text-gray-500">Memuat data...</p>';

  try {
    const response = await fetch(`/user/bookings/status/${tabName}`, {
  headers: {
    'X-Requested-With': 'XMLHttpRequest'
  }
});

    if (!response.ok) throw new Error('Gagal mengambil data');
    const html = await response.text();
    tabContent.innerHTML = html;
  } catch (error) {
    console.error('Error loading tab:', error);
    tabContent.innerHTML = '<p class="text-red-500">Gagal memuat data.</p>';
  }
}

  </script>
</x-app-layout>
