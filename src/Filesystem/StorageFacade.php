<?php

namespace KeltieCochrane\Illuminate\Filesystem;

use Themosis\Facades\Facade;
use Illuminate\Filesystem\Filesystem;

/**
 * @see \Illuminate\Filesystem\FilesystemManager
 */
class StorageFacade extends Facade
{
  /**
   * Replace the given disk with a local, testing disk.
   *
   * @param  string  $disk
   * @return void
   */
  public static function fake($disk)
  {
    (new Filesystem)->cleanDirectory(
      $root = storage_path('framework/testing/disks/'.$disk)
    );

    static::set($disk, self::createLocalDriver(['root' => $root]));
  }

  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor()
  {
    return 'filesystem';
  }
}
