<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <title>Pengaduan</title>
    <style type="text/tailwindcss">
        @layer utilities {
            .content-auto {
                content-visibility: auto;
            }
        }
    </style>
</head>

<body class="">

    @include('frontend.inc.navbar')

    <section class="bg-gray-50">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 grid lg:grid-cols-2 gap-8 lg:gap-16">
            <div class="flex flex-col justify-center">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl lg:text-6xl ">
                    Lorem ipsum, dolor sit amet consectetur.</h1>
                <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl ">Lorem ipsum dolor sit, amet consectetur
                    adipisicing elit. Expedita molestiae dolor tempore, accusamus totam doloribus blanditiis minima.
                    Mollitia, animi minima!</p>

                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm py-2.5 text-center "
                    type="button">
                    ADD MORE CATEGORY
                </button>

                @include('frontend.inc.modal-create')

            </div>
            <div>
                <div class="w-full lg:max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow-xl dark:bg-gray-800">
                    <h2 class="text-2xl font-bold">
                        Adukan Masalah
                    </h2>
                    <form class="mt-8 space-y-6" action="{{ route('user.store') }}" method="post">
                        @csrf
                        @method('POST')

                        <div>
                            <label for="#pengaduan" class="block mb-2 text-sm font-medium">Deskripsi
                                Pelanggaran</label>
                            <textarea type="text" name="pengaduan" id="pengaduan" rows="4"
                                class="block p-2.5 w-full text-sm bg-gray-50 rounded-lg border border-gray-300"
                                placeholder="Write your thoughts here..."></textarea>
                        </div>

                        <label for="#level" class="block mb-2 text-sm font-medium ">Select an
                            option</label>
                        <select id="level" name="level"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                            <option selected>Tingkat Pelanggaran</option>
                            <option value="Ringan">Ringan</option>
                            <option value="Sedang">Sedang</option>
                            <option value="Berat">Berat</option>
                        </select>


                        <label for="#category" class="block mb-2 text-sm font-medium ">Category
                            Pelanggaran</label>
                        <select class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                            id="category" name="category_id">
                            <option selected>Category</option>
                            @foreach ($category as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>


                        <button type="submit"
                            class="w-full px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 sm:w-auto ">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>



    @foreach ($pengajuan as $item )
    <ol class="relative mx-5 border-s border-gray-200 ">
        <li class="mb-10 ms-6">
            <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white">
                <svg class="w-2.5 h-2.5 text-blue-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </span>
            <h3 class="mb-1 text-lg font-semibold">Anonymous</h3>
            <time class="block mb-2 text-sm font-normal leading-none text-gray-400">sent on {{ $item->created_at->format('d' . '-' . 'F' . '-' . 'Y') }} </time>
            <p class="text-base font-normal text-gray-600 ">All of the pages and components are first
                designed in Figma and we keep a parity between the two versions even as we update the project.</p>
                
                <p class="m-2"><span class="text-base font-normal text-gray-600">Deskripsi Pengaduan:</span>
                    {{ $item->pengaduan }} </p>
                <p class="m-2"><span class="text-base font-normal text-gray-600">Tingkat Pengaduan:</span>
                    @if ($item->level == 'Ringan')
                        <span class="badge bg-info"><i class='bx bx-info-circle'></i> Ringan</span>
                    @elseif ($item->level == 'Sedang')
                        <span class="badge bg-warning"><i class='bx bx-info-circle'></i> Sedang</span>
                    @else
                        <span class="badge bg-danger"><i class='bx bx-info-circle'></i> Berat</span>
                    @endif
                </p>
                <p class="m-2"><span class="text-base font-normal text-gray-600">Category Pengaduan:</span>
                    {{ $item->category->name }} </p>
                <p class="m-2"><span class="text-base font-normal text-gray-600">Reply:</span> {{ $item->reply }}</p>
                <p class="m-2"><span class="text-base font-normal text-gray-600">Has Seen:</span>
                    @if ($item->status == false)
                        Hasn't Seen ❌
                    @else
                        Have Seen ✅
                    @endif
                </p>
        </li>
    </ol>
    @endforeach
    






</body>

</html>
