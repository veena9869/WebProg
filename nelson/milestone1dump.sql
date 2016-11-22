-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 18, 2016 at 05:27 PM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `askhere`
--
CREATE DATABASE IF NOT EXISTS `askhere` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `askhere`;

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
CREATE TABLE IF NOT EXISTS `activities` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` int(10) UNSIGNED NOT NULL,
  `activity` varchar(255) NOT NULL DEFAULT '',
  `points` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `activityid` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `questionid` int(10) UNSIGNED NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `userid` int(10) UNSIGNED NOT NULL,
  `accepted` int(10) UNSIGNED NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `questionid`, `description`, `created`, `updated`, `userid`, `accepted`, `votes`) VALUES
(1, 1, 'Some of these answers and comments never fail to amaze me. Liberals think that us Republicans are lunatics and crazy because we see potential in Trump, yet many people think that Hillary is the next God. Give me a break. Why would anyone in their right mind want to vote for her for president? The amount of lies and screw ups she has made in her lifetime is never ending. Not to mention the lives/deeaths she was responsible for. People say Trump is a racist and disrespectful towards woman? Not true. Congratulations to those who believe everything the media has to say. Your brains are now fried more than ever before. Dig deeper and read the facts before you begin to post uneducated answers that make only you look like a fool. SO, to answer the question, I believe Trump has a great chance of winning. Unfortunately, I believe the government is very bias and they already have their mind made on Hillary. This country will be in a sad place in the next couple of weeks no matter who wins because it seems as if hardly of our citizens are actually willing to get along and suck it up and go with the flow. Whoever is elected will be President no matter what and there is no way to change that. Make the best of it and hope good change will come with the election.', '2016-10-18 04:20:25', '2016-10-18 04:20:25', 9, 0, 0),
(2, 2, 'You can find the form for assistance on the FEMA website at DisasterAssistance.gov\nIf you are in an area with an internet outage, you can call 1-800-621-FEMA (3362).\n\nYou are going to need some basic information:\n\n    Social Security number\n    Pre disaster and present address\n    Bank routing number\n    Insurance information\n    Annual income amount\n    A phone number you can be reached at.\n', '2016-10-18 04:30:36', '2016-10-18 04:30:36', 10, 0, 0),
(3, 3, 'Take a new cell with identifier and design it as above. When you get array empty then return 1 in number of rows in section and load this cell', '2016-10-18 04:40:07', '2016-10-18 04:40:07', 11, 0, 0),
(4, 4, '\nIn .NET 4.0 and later:\n\nString.Join(delimiter, list);\n\nis sufficient. For older versions you have to:\n\nString.Join(delimiter, list.ToArray());\n\n', '2016-10-18 04:45:43', '2016-10-18 04:47:17', 13, 0, 0),
(5, 6, '\n\nI replicated your code and didn\'t see what you\'re seeing, so I think you may have other styles on the page where you\'re plotting this that are interfering with the layout. You can take the height attribute off the td elements; then try adding a style="" attribute on the table and testing different properties.\n\n', '2016-10-18 04:51:10', '2016-10-18 04:51:10', 16, 0, 0),
(6, 7, '\n\nAre your keys strings?\n\nEvery JavaScript object is a map, which means that it can represent a set.\n\nAs illustrated in the page you mentioned, each object will accept only one copy of each key (attribute name). The value for the key/attribute doesn\'t matter.\n', '2016-10-18 04:53:14', '2016-10-18 04:53:14', 18, 0, 0),
(7, 8, '\n\nYou should add these code\n\n                    if(name.equals("Inbox")){\n                        categoryMode1= new CategoryModel(itemData,name,R.drawable.ic_inbox, itemCount);\n                    }else if(name.equals("Stared")){\n                        categoryMode1= new CategoryModel(itemData,name,R.drawable.ic_stars, itemCount);\n                    }else{\n                        categoryMode1= new CategoryModel(itemData,name,R.drawable.ic_inbox, itemCount);\n                    }\n\n                    mainData.add(categoryMode1);\n                    mainAdapter.notifyDataSetChanged();` \n\ninto the FinalCallback. You got 0 for itemCount because you are calling in an uninitialized field. itemCount got its value inside the FinalCallback which runs in a separate non UI thread which means the UI thread from where you are accessing it may run before the non UI thread. So you should move you logic which uses data that is retrieved from parse into FinalCallback\n', '2016-10-18 04:55:47', '2016-10-18 04:55:47', 20, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `answers_votes`
--

DROP TABLE IF EXISTS `answers_votes`;
CREATE TABLE IF NOT EXISTS `answers_votes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `answerid` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `vote` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` int(10) UNSIGNED NOT NULL,
  `comment` text CHARACTER SET latin1 NOT NULL,
  `votes` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `userid` int(10) UNSIGNED NOT NULL,
  `typeid` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments_votes`
--

DROP TABLE IF EXISTS `comments_votes`;
CREATE TABLE IF NOT EXISTS `comments_votes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `commentid` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `questionid` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link` text CHARACTER SET latin1 NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `linkcache` longtext CHARACTER SET latin1 NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0',
  `accepted` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `answers` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `kb` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `slug` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `created`, `updated`, `link`, `userid`, `linkcache`, `votes`, `accepted`, `answers`, `kb`, `slug`) VALUES
(1, '2016 Presidential Election ', 'Who do you think will win the 2016 Presidential elections, Donald Trump or Hillary Clinton ?', '2016-10-18 04:17:16', '2016-10-18 04:20:25', '', 7, '', 0, 0, 1, 0, '2016-presidential-election'),
(2, 'Hurricane Matthew', 'How do victims of Hurricane Matthew get a FEMA registration number?\n', '2016-10-18 04:28:13', '2016-10-18 04:30:36', '', 9, '', 0, 0, 1, 0, 'hurricane-matthew'),
(3, 'Plain Picture and Plain text in Tableview', 'How show plain picture or plain text when no data available in TableView in objective c?', '2016-10-18 04:35:10', '2016-10-18 04:40:07', '', 10, '', 1, 0, 1, 0, 'plain-picture-and-plain-text-in-tableview'),
(4, 'Linq compare 2 string arrays when both have same values', 'I have 2 string arrays/values x,y and am trying to get values of y which are not in x. I am trying to get this value only in case if all values of x are also in y.\n\n        string x = "CA ,WA";\n        string y = "CA,WA,NY";\n        var srcDetails = x.ToLower().Replace(" ", string.Empty).Split(\',\');\n        var dstDetails = y.ToLower().Replace(" ", string.Empty).Split(\',\');\n\n        var common = dstDetails.Intersect(srcDetails); //common in x,y\n\n        var destGreaterSrc= dstDetails.Except(srcDetails); //if y &gt; x\n\n        var extraInDest = dstDetails.Except(common); \n\nextraInDest is extra value in y which is not in x\n\nIn above code extra values in dest which is outputted as NY.\n\nI am trying to find the scenario where values of x may not be equal to y like\n\n    string x = "CA ,NV";\n    string y = "CA,WA,NY";\n\nhow can we make var extraInDest output to false.', '2016-10-18 04:44:05', '2016-10-18 04:47:17', '', 12, '', 1, 0, 1, 0, 'linq-compare-2-string-arrays-when-both-have-same-values'),
(5, 'Kotlin custom attribute databinding', '\n\nI am trying to set custom attribute using the android databinding library (https://developer.android.com/topic/libraries/data-binding/index.html) in my kotlin project like below.\n\n\n\nclass Utils {\n    companion object {\n        @BindingAdapter("bind:imageUrl")\n        @JvmStatic\n        fun loadImage(view: ImageView, url:String) \n        {Picasso.with(view.context).load(url).error(R.drawable.error).into(view)}\n}               \n\nThe runtime error I get is:\n\n    A BindingAdapter in in is not static and requires an object to use, retrieved from the DataBindingComponent. If you don\'t use an inflation method taking a DataBindingComponent, use DataBindingUtil.setDefaultComponent or make all BindingAdapter methods static.\n\nAny pointers to solve it ?\n\nThis happens only for custom attributes.The rest of the databindings work fine\n', '2016-10-18 04:46:58', '2016-10-18 04:46:58', '', 13, '', 0, 0, 0, 0, 'kotlin-custom-attribute-databinding'),
(6, 'Reducing table height in html/php', 'I am working plotting one html/php table using following code.\n\n$color=array("#000000","#0000FF","00FFFF","#00FF00","#FFFF00","#7FFFD4","#FF0000","#FF9900","#FFFFFF","#00BFFF");\necho "<br />Color Codes:<br /><br />";\necho \'<table border="1" cellpadding="0" cellspacing="0"><tr><td height="5" width="10">($i/10)</td></tr></table><br />\'; \n\nBut when I plot this I get following output:', '2016-10-18 04:49:56', '2016-10-18 04:51:10', '', 15, '', 0, 0, 1, 0, 'reducing-table-height-in-htmlphp'),
(7, 'Does Javascript supports Sets?', '\n\nDoes Javascript supports Sets(list with unique objects only) ?\n\nI have found this link, but from what I remember foreach in JS in not supported by every browser.\n', '2016-10-18 04:52:38', '2016-10-18 04:53:14', '', 16, '', 1, 0, 1, 0, 'does-javascript-supports-sets'),
(8, 'ParseQuery from field not save', 'ItemCount field not working\n\nCategoryModel constructs is ItemCount = 0 not working\n\nParseObject parseObjectCategory = Categorylist.get(i);\n\n                        ParseQuery query = ParseQuery.getQuery("List");\n                        query.whereEqualTo("parent", parseObjectCategory);\n\n                        query.findInBackground(new FindCallback() {\n                            public void done(List scoreList, ParseException e) {\n                                if (e == null) {\n                                    itemCount = scoreList.size();\n                                    Log.e("ItemCountGENERAL",""+itemCount);\n                                } else {\n                                    Log.e("Aldaa","---------------------------------------------------------------");\n                                }\n                                itemCount = scoreList.size();\n                            }\n                        });\n\n                        Log.e("ItemCount",""+itemCount);\n\n                        if(name.equals("Inbox")){\n                            categoryMode1= new CategoryModel(itemData,name,R.drawable.ic_inbox, itemCount);\n                        }else if(name.equals("Stared")){\n                            categoryMode1= new CategoryModel(itemData,name,R.drawable.ic_stars, itemCount);\n                        }else{\n                            categoryMode1= new CategoryModel(itemData,name,R.drawable.ic_inbox, itemCount);\n                        }\n\n                        mainData.add(categoryMode1);\n                        mainAdapter.notifyDataSetChanged();\n                    }`', '2016-10-18 04:54:59', '2016-10-18 04:55:47', '', 18, '', -2, 0, 1, 0, 'parsequery-from-field-not-save'),
(9, 'How to convert ByteBuffer to Image in HTML', 'I convert the image to bytebuffer in java and send it through websocket in java to client. Java side look like :\n\n@OnOpen\npublic void onOpen(Session sessions) {\n    String fileName = sessions.getUserPrincipal().getName() + ".png";\n    File fi = new File("/Users/shilu/MyProject/Chat/Photo/" + fileName);\n    byte[] fileContent = null;\n    try {\n        fileContent = Files.readAllBytes(fi.toPath());\n        ByteBuffer buf = ByteBuffer.wrap(fileContent);\n        sessions.getBasicRemote().sendBinary(buf);\n    } catch (IOException e) {\n        e.printStackTrace();\n    }\n}\nIn client side I just get it like this :\n\ngp.onmessage = function(evt) {\n    var msg = evt.data;\n};\nNow how do I display that image in html...?', '2016-10-18 13:38:48', '2016-10-18 13:38:48', '', 7, '', 1, 0, 0, 0, 'how-to-convert-bytebuffer-to-image-in-html');

-- --------------------------------------------------------

--
-- Table structure for table `questions_votes`
--

DROP TABLE IF EXISTS `questions_votes`;
CREATE TABLE IF NOT EXISTS `questions_votes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `questionid` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `vote` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `questions_votes`
--

INSERT INTO `questions_votes` (`id`, `questionid`, `userid`, `vote`) VALUES
(1, 9, 7, 1),
(2, 3, 16, 1),
(3, 4, 15, 1),
(4, 7, 13, 1),
(5, 8, 16, -2);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(1, 'android-databinding'),
(2, 'kotlin'),
(3, 'html-table'),
(4, 'html'),
(5, 'php'),
(6, 'no-duplicates'),
(7, 'javascript'),
(8, 'set'),
(9, 'field'),
(10, 'java'),
(11, 'android');

-- --------------------------------------------------------

--
-- Table structure for table `tags_questions`
--

DROP TABLE IF EXISTS `tags_questions`;
CREATE TABLE IF NOT EXISTS `tags_questions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tagid` int(10) UNSIGNED NOT NULL,
  `questionid` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tags_questions`
--

INSERT INTO `tags_questions` (`id`, `tagid`, `questionid`) VALUES
(1, 1, 5),
(2, 2, 5),
(3, 3, 6),
(4, 4, 6),
(5, 5, 6),
(6, 6, 7),
(7, 7, 7),
(8, 8, 7),
(9, 9, 8),
(10, 10, 8),
(11, 11, 8),
(12, 4, 9),
(13, 7, 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `moderator` int(10) UNSIGNED NOT NULL,
  `created` datetime NOT NULL,
  `lastactivity` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `username` (`email`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `name`, `email`, `points`, `moderator`, `created`, `lastactivity`) VALUES
(7, '1b1b777cbcab66b3d31d271ad917deb890c29363', 'admin', NULL, 1, 0, '2016-10-17 15:32:39', '2016-10-17 15:32:39'),
(13, 'f9f94c806adaa7696411fee3e224e5fab115045d', 'ltully', NULL, 1, 0, '2016-10-17 15:41:18', '2016-10-17 15:41:18'),
(9, '777a15f8f22b0dd5f988e820f52e276415a843c5', 'jbrunelle', NULL, 1, 0, '2016-10-17 15:33:27', '2016-10-17 15:33:27'),
(10, '278f11a03f406283c7b46b33c2eb7475d8326df6', 'pvenkman', NULL, 1, 0, '2016-10-17 15:34:25', '2016-10-17 15:34:25'),
(11, '6ca6a9896b0c34fa8e76b7b9c3e1dc3bd0328c56', 'rstantz', NULL, 1, 0, '2016-10-17 15:35:36', '2016-10-17 15:35:36'),
(12, '80a81b5cd31ae5052d2dc5ccbc1a10da6dfbe7d3', 'dbarrett', NULL, 1, 0, '2016-10-17 15:36:49', '2016-10-17 15:36:49'),
(16, 'd89fde213303f98c3926e4cdede8d08a3c83961c', 'janine', NULL, 1, 0, '2016-10-17 15:42:44', '2016-10-17 15:42:44'),
(15, '7cb9f3d640bcbcc992631bd9a7eafb9a61dc5798', 'espengler', NULL, 1, 0, '2016-10-17 15:41:56', '2016-10-17 15:41:56'),
(18, '56b51b7ae8aaf3d7ae105b5a8f024d9ccfe222e1', 'winston', NULL, 1, 0, '2016-10-17 15:44:50', '2016-10-17 15:44:50'),
(22, 'a5bc6a7dcc26b4c7fad937a49ecca2a535029004', 'zuul', NULL, 1, 0, '2016-10-17 15:46:51', '2016-10-17 15:46:51'),
(20, '071ec8f6454b6a24761e9ba560ccefddd26ebed4', 'gozer', NULL, 1, 0, '2016-10-17 15:45:15', '2016-10-17 15:45:15'),
(21, '075f6b7450c84a0938e72ebf764ebc76b5050194', 'slimer', NULL, 1, 0, '2016-10-17 15:45:39', '2016-10-17 15:45:39'),
(24, '894f3b7bdc126bd0e8c38782b08fe962c76fc2df', 'keymaster', NULL, 1, 0, '2016-10-17 15:47:18', '2016-10-17 15:47:18'),
(25, '3a3dd7b2e0506a3a09aaa0842ae53dc5a5fc48f2', 'gatekeeper', NULL, 1, 0, '2016-10-17 15:47:43', '2016-10-17 15:47:43'),
(26, '6b70310905f671f3da3a255f54ac8fd87c61a266', 'staypuft', NULL, 1, 0, '2016-10-17 15:48:16', '2016-10-17 15:48:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions` ADD FULLTEXT KEY `title` (`title`,`description`);
