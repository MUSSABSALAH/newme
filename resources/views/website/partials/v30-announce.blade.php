{{-- Sitewide rotating announce bar — shipping first so the homepage opens on it --}}
@php
  $announceMessages = $announceMessages ?? [
      __('website.site.announce.shipping'),
      __('website.site.announce.partners'),
      __('website.site.announce.consult'),
  ];
@endphp
<div class="announce" id="announce">
  @foreach ($announceMessages as $i => $line)
    <span @class(['on' => $i === 0])>{!! $line !!}</span>
  @endforeach
</div>
