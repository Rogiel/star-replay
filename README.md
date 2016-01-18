# Star Replay

This library allows you to read StarCraft II replay files from PHP.

A object-oriented API is provided to browse through all metadata and events available on replays.

## Features
* Read .SC2Replay files from all public game versions (data is mined from [s2protocol](https://github.com/Blizzard/s2protocol))
* **Game events**: Streams events using PHP 5 generators
* **Lazy parsing**: Parses only structures you require

## Installation

The recommended way of installing this library is using Composer.

    composer require "rogiel/star-replay"
    
This library uses [php-mpq](https://github.com/Rogiel/php-mpq) to parse and extract compressed information inside replays.
    
## Example

```php
use Rogiel\StarReplay\Replay;
use Rogiel\StarReplay\Event\Game\CameraSaveEvent;

$replay = new Replay('test.SC2Replay');

echo "Version: " . $replay->getHeader()->getVersion() . "\n";
echo "Map: " . $replay->getMatchInformation()->getTitle() . "\n";
echo "Players:\n";
foreach($replay->getPlayers() as $id => $player) {
	echo "\tPlayer ".$id.": ".$player->getName()."\n";
}

echo "Camera hotkeys:\n";
foreach($replay->getGameEvents() as $timestamp => $event) {
	if($event instanceof CameraSaveEvent) {
		$player = $replay->getPlayers()->getPlayer($event->getHeader()->getUserID());
		echo "\tPlayer ". $player->getName() ." saved a new camera #". $event->getWhich() ." at point ". $event->getTarget() ."\n";
	}
	// since we are using generators, the events will stream linearly from begining to end
}
```
