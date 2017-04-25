<?php

/*
 * Copyright (C) 2017 hans-rudolf.
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301  USA
 */
 
/**
 * Description of DefaultPageModel
 *
 */
class DefaultPageModel implements IModel
{
        public $blogPosts;
        
        private $modelSubscribers = [];
        
        public function doSomething()
        {
                
                $this->blogPosts = [
                        0=>["date"=>new DateTime("Mon, 24 Apr 2017 08:22 +0100"),
                                "title"=>"Small steps, steep learning curve.",
                                "story"=>"If you have a milkshake, and I have a milkshake."
                                ],
                        1=>["date"=>new DateTime("Sun, 23 Apr 2017 16:15 +0100"),
                                "title"=>"April does what it wants.",
                                "story"=>"I don't know what to wear. A shirt a rain coat or an anorak. But I am thankful for every bit of sunshine I receive."
                                ],
                        2=>["date"=>new DateTime("Sat, 22 Apr 2017 22:04 +0100"),
                                "title"=>"Netbeans you came into my life",
                                "story"=>"Much attention. Many tweaks. So much feature. You make me happy my little friend. I never knew I needed you until I met you."
                                ],
                        3=>["date"=>new DateTime("Thu, 20 Apr 2017 17:14 +0100"),
                                "title"=>"Shura White Light",
                                "story"=>"Sometimes you find a song that just catches you out of the blue. I wished I could link it to you but this but... ahh well <a href='https://www.youtube.com/watch?v=_N8mONNW_Ik'>some inline html never harmed anyone</a> right?"
                                ]
                ];
                $this->publish(new ModelEvent('ready', $this->blogPosts));
        }
        public function subscribe(\IModelSubscriber  $modelSubscriber) {
                $this->modelSubscribers[] = $modelSubscriber;
        }
        private function publish(\IModelEvent $event) {
                foreach ($this->modelSubscribers as $modelSubscriber) {
                        $modelSubscriber->processModelEvent($event);
                }
        }
}
