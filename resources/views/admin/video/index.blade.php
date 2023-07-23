@extends("admin.admin_dashboard")
@section("admin")
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-xs-12">
                <h1 class="h3">All Video Gallery  <span class="text-white bg-blue-900 status">{{ count($video) }}</span></h1>

                <div class="md:justify-between md:flex">
                    <a href="{{ route('video#gallery#add') }}" class="h-12 mt-5 rounded btnTW btnTW-info">Add Video Gallery</a>
                    {{ $video -> links() }}
                </div>

                <div class="max-w-screen-xl px-5 mx-auto">
                    <div class="my-20 overflow-x-auto border rounded-lg ">
                        <table class="w-full">
                        <tbody>
                            <tr class="bg-gray-50">
                                <th class="thTW">No</th>
                                <th class="thTW">Photo</th>
                                <th class="thTW">Title</th>
                                <th class="thTW">URL</th>
                                <th class="thTW">Post Date</th>
                                <th class="thTW">Actions</th>
                            </tr>
                            @foreach ($video as $key=>$gallery)
                                <tr class="tbodyTW-tr">
                                    <td class="td">{{ $key+1 }}</td>
                                    <td class="td">
                                        <div class="image-block">
                                            <img src="{{ asset( $gallery->image ) }}" class="image" alt="">
                                        </div>
                                    </td>
                                    <td class="td">
                                        {{ $gallery->title }}
                                    </td>
                                    <td class="td">
                                        <a href="{{ $gallery->url }}" class="text-gray-700 ">{{ $gallery->url }}</a>
                                    </td>
                                    <td class="td">
                                        @if ($gallery->date == NULL)
                                            No Date
                                        @else
                                        {{ $gallery->date }}
                                        @endif
                                    </td>
                                    <td class="td">
                                        <div class="flex w-[180px]">
                                            <form class="inline" action="{{ route('video#gallery#delete', $gallery->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="rounded btnTW btnTW-danger"><i class="fa-solid fa-trash"></i> Delete</button>
                                            </form>

                                            <a class="ml-4 rounded btnTW btnTW-success text-decoration-none edit-button" href="{{ route('video#gallery#edit', $gallery->id) }}"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
