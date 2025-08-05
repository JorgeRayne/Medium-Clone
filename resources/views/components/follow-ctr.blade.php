@props(["user"])

<div x-data="{
    following : {{ $user->isFollowedBy(auth()->user()) ? 'true' : 'false'}},
    followersCount: {{$user->follower->count()}},
    follow() {
        axios.post('/follow/{{ $user->id }}').then(res => {
            console.log(res.data);
            this.following = !this.following
            this.followersCount = res.data.followersCount
        }).catch(err => {
            console.log(err)
            })
        }
    }" class="w-[320px] border-l px-8">
    {{$slot}}
</div>