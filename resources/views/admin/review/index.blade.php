@extends("admin.admin_dashboard")
@section("admin")
<div class="container">
    <div class="row">
        <div class="col-md-11 ">
            <h1 class="h3">All Inactive Review List <span class="text-white status bg-sky-600 ">{{ count($reviews) }}</span></h1>
            <div class="md:justify-between md:flex">
                {{ $reviews -> links() }}
            </div>
            <div class="max-w-screen-xl px-5 mx-auto">

                <div class="my-12 overflow-x-auto border rounded-lg ">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="thTW">No</th>
                                <th class="thTW">Image</th>
                                <th class="thTW">News Title</th>
                                <th class="thTW">User</th>
                                <th class="thTW">Comment</th>
                                @if (Auth::user()->can('review.active'))
                                <th class="thTW">Status</th>
                                @endif
                                @if (Auth::user()->can('review.delete'))
                                    <th class="thTW">Action</th>
                                @endif
                            </tr>
                        </thead>
                        @foreach ($reviews as $key => $review)
                            <tbody>
                                <tr>
                                    <td class="td">{{ $key+1 }}</td>
                                    <td class="flex td">
                                        <div class="image-block">
                                            <img src="{{ (!empty(asset($review['news']['image']))) ? asset($review['news']['image']):url('backend/assets/dist/img/newspost/news_img/no_image.jpg') }}" class="image" >
                                        </div>
                                    </td>
                                    <td class=""> {{ $review['news']['news_title'] }}</td>
                                    <td class=""> {{ $review['user']['name'] }}</td>
                                    <td class="td">{{ Str::limit($review->comment, 18) }}</i></td>

                                    @if (Auth::user()->can('review.active'))
                                        <td class="td">
                                            @if ($review->status == 1)
                                                <a href="{{ route('review#inactive', $review->id) }}">
                                                    <span class="text-green-900 bg-green-300 cursor-pointer status">Approve</span>
                                                </a>

                                                @elseif ($review->status == 0)
                                                <a href="{{ route('review#active', $review->id) }}">
                                                    <span class="text-red-900 bg-red-300 cursor-pointer status">Not Approve</span>
                                                </a>
                                            @endif
                                        </td>
                                    @endif
                                    @if (Auth::user()->can('review.delete'))
                                        <td class="td">
                                            <div class="flex w-[180px]">
                                                <a href="{{ route("review#delete",$review->id) }}" class="rounded btnTW btnTW-danger"><i class="fa-solid fa-trash"></i> Delete</a>
                                            </div>
                                        </td>
                                    @endif

                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
